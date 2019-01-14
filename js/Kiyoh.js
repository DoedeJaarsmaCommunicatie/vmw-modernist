function vmw_request() {
    let xhr = new XMLHttpRequest();

    xhr.open('get', 'https://vindmijnwijn.nl/vmw_new_staging/wp-admin/admin-post.php?action=fetch_kiyoh')

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.vmw = {};
            try {
                window.vmw = JSON.parse(this.response).data;
                console.log(window.vmw);
                let el = document.querySelector('[data-score]');
                el.dataset.score = window.vmw.total_score
                el.innerHTML = el.dataset.score;
            } catch (e) {
                console.warn(e);
            }
        }
    }

    try {
        xhr.send();
    } catch ( e ) {
        console.warn(e)
    }
}

document.addEventListener('DOMContentLoaded', () => {
    vmw_request();
})