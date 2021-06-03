let modalNewFigure = new bootstrap.Modal(document.getElementById('exampleModal'), {
    keyboard: false
})

const changeInputBlock = (figura) => {
    let blocks = document.querySelectorAll('.input-figures');
    blocks.forEach(el => {
        if(figura === el.getAttribute("data-type")){
            el.classList.add('active');
        }else{
            el.classList.remove('active');
        }
    })
}

document.getElementById('new-form').addEventListener('submit', function (e){
    e.preventDefault();
    let fd = new FormData(document.getElementById('new-form'));
    let xhr = new XMLHttpRequest();
    xhr.open('post', '/action_add_form.php');
    xhr.send(fd);
    xhr.onload = function() {
        if (xhr.status == 200) {
            try{
                let result = JSON.parse(xhr.responseText);
                let countFigure = document.querySelectorAll('.figure-item').length;
                document.getElementById('figure-list')
                    .innerHTML += `
                                    <tr class="figure-item">
                                        <th scope="row">${countFigure + 1}</th>
                                        <td>${result.title}</td>
                                        <td>${result.area}</td>
                                    </tr>
                                `;
                modalNewFigure.hide();
            }catch (e) {
                console.log(xhr.responseText);
            }
        }
    };
})