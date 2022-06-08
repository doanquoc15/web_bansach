
const search = document.querySelector('.search')
const btn = document.querySelector('.btn_search')
const input = document.querySelector('.input_search')

search.addEventListener('click', () => {
    search.classList.toggle('active')
    input.focus()
})