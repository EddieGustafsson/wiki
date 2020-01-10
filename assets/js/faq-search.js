function faqSearch(input_id, container_id, object_class_name, location) {
    var input, filter, cards, cardContainer, title, i;
    
    input = document.getElementById(input_id);
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById(container_id);
    cards = cardContainer.getElementsByClassName(object_class_name);

    for (i = 0; i < cards.length; i++) {
        if(cards[i].querySelector(location) != null){
            title = cards[i].querySelector(location);
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            } 
        } else {
            title = cards[i].title;
            if (title.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
            
        }
        
    }
}