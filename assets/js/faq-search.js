function faqSearch() {
    var input, filter, cards, cardContainer, h5, title, i;
    
    input = document.getElementById("faqFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("accordionExample");
    cards = cardContainer.getElementsByClassName("card");

    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".card-body .btn-link");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}