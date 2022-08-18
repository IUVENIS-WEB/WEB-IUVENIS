//validação - criação de uma nova coleção
const nomeColecao = document.getElementById("nomeColecao");
        const submit = document.getElementById("submit");

        nomeColecao.addEventListener('input', () => {
            if (nomeColecao.value === "") {
                submit.disabled = "disabled";

            } else {
                submit.removeAttribute('disabled');
            }
        })

        function getLists() {
            return document.querySelectorAll('.bookmark')
        }

        function enableClickEventsOnList(list) {
            list.addEventListener('click', async function() {
                let colecoes = await getColecoes()
                colecoes.forEach(element => {
                    list.appendChild(criaItemColecao(element))
                });
            })

        }

        function getColecoes() {
            return fetch('/getColecaos', {
                    method: 'GET',
                    mode: 'same-origin',
                })
                .then(
                    response => response.json()
                )
        }
        async function salvaPost(postId, colecaoId) {
            let response = await fetchPost('/salvaPost', {
                post_id: postId,
                colecao_id: colecaoId
            })
            if (response.success) {
                alert('Post salvo com sucesso.')
            } else {
                alert(response.message)
            }
        }

        async function salvaColecao(nome) {
            let response = await fetchPost('/salvaColecao', {
                nome: nome
            })
            if (response.success) {
                alert('Coleção salva com sucesso.')
            } else {
                alert(response.message)
            }
            return response
        }

        async function criar_colecao(){
            let nome = document.getElementById('nomeColecao').value
            let post_id = document.getElementById('post_id').value

            let colecaoResponse = await salvaColecao(nome)
            if(colecaoResponse.success){
                salvaPost(post_id, colecaoResponse.data.id)

            }
        }

        function criaItemColecao(item) {
            let li = document.createElement('li')
            let a = document.createElement('a')
            a.classList.add('dropdown-item')
            a.setAttribute('href', "{{ URL::to('/colecao') }}" + '/' + item.id)
            a.textContent = item.nome

            li.appendChild(a)

            return li
        }

        function inputPostValue(e) {
            let input = document.getElementById('post_id')
            input.value = e
        }