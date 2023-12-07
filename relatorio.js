const button = document.querySelector('.buscar')
const input = document.querySelector('.caixa')
const listacompleta = document.querySelector('.tabelas')

let lista = []


function AdicionarNovosRelatorios(){
    lista.push(input.value)
    mostrarrelatorios()
    input.value=''

}

function mostrarrelatorios(){

    let novadiv

    lista.forEach(relatorios =>{
        novadiv = novadiv +`
        <div class="a1">
            <h2>
                ${relatorios}
            </h2>
            <button>
                entrar
            </button>
        </div>
        
        `
    })

    listacompleta.innerHTML = novadiv
}

button.addEventListener('click', AdicionarNovosRelatorios)
