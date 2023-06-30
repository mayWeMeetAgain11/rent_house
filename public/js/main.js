let itemlist = document.querySelectorAll('.itemlist li');
let cards = document.querySelectorAll('.card');
let specialheadeing = document.querySelector('.special-headeing');
itemlist.forEach((li) => {
    li.addEventListener('click', function() {
        itemlist.forEach((li) => {
            li.classList.remove('active');
        })
        li.classList.add('active');
        let att = li.getAttribute('data-filter');
        specialheadeing.innerHTML = `${att}`;
        cards.forEach((item) => {
            item.classList.remove('active');
            item.classList.add('hide');
            if (item.getAttribute('data-item') === att || att === 'All') {
                item.classList.remove('hide');
                item.classList.add('active');
            }
        })
    })
})

