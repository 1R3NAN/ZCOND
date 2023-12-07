const button = document.querySelector('.buscar')
const input = document.querySelector('.caixa')
const listacompleta = document.querySelector('.tabelas')

let lista = []


function AdicionarNovasTarefas(){
    lista.push(input.value)
    mostrartarefas()
    input.value=''

}

function mostrartarefas(){

    let novadiv

    lista.forEach(condominios =>{
        novadiv = novadiv +`
        <div class="a1">
            <h2>
                ${condominios}
            </h2>
            <button>
                entrar
            </button>
        </div>
        
        `
    })

    listacompleta.innerHTML = novadiv
}

button.addEventListener('click', AdicionarNovasTarefas)