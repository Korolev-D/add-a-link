document.addEventListener('DOMContentLoaded', function () {
    var app = new Vue({
        el: '#app',
        data: {
            posts: [],
            postsCopy: []
        },
        methods: {
            createPost(e) {
                const formData = new FormData(e.target.parentNode);
                fetch("../../create_post.php", {
                    method: 'post',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        const message = document.getElementById('message');
                        message.innerText = data;
                        setTimeout(() => message.innerText = "", 5000);
                        e.target.parentNode.querySelector("input[name='description']").innerHTML = '';
                        e.target.parentNode.querySelector("input[name='url']").innerHTML = '';
                        //проверка прав
                        // if (data == false) {
                        //     document.querySelector('.is-admin').classList.remove('d-none')
                        // }
                    })
            },
            openModal(e) {
                const id = e.target.parentNode.getAttribute('data-id');
                fetch("../../get_modal.php", {
                    method: 'post',
                    body: JSON.stringify({"id": id}),
                })
                    .then(response => response.json())
                    .then(data => document.querySelector(".modal-content").innerHTML = data)
            },
            sortingType(e) {
                document.querySelectorAll('.aside li').forEach(elem=>elem.classList.remove('current'))
                e.target.parentNode.classList.add('current');
                const type = e.target.parentNode.getAttribute('data-type');
                this.postsCopy = this.posts;
                this.postsCopy = this.postsCopy.filter(function (elem) {
                    if (elem.TYPE == type) {
                        return elem;
                    }
                });
                if (type == 'all') {
                    this.postsCopy = this.posts
                }
            }

        },


        created() {
            fetch("../../get_posts.php")
                .then(response => response.json())
                .then(data => {
                    this.posts = data,
                        this.postsCopy = data
                })
        }

    })
})
