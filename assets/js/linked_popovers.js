
let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {

        jsonData = JSON.parse(this.responseText);
        var links = $('#test-markdown-view').find('a');
        links.attr("style", "color:red;");
        links.attr("data-content","Sidan finns inte.").data('popover');

        for(i = 0; i < links.length; i++){

            var link = links[i];
            var title = link.getAttribute("data-original-title");

            for(j = 0; j < jsonData.sidor.length; j++){

                if(title == jsonData.sidor[j].titel){

                    let desc = jsonData.sidor[j].innehall;//0 bör ändras till page_id

                    let maxLength = 200; // maximum number of characters to extract

                    //trim the string to the maximum length
                    let trimmedString = desc.substr(0, maxLength);

                    //re-trim if we are in the middle of a word
                    trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
                    trimmedString = trimmedString.replace(/#|>/g,'');
                    //trimmedString = trimmedString.replace(/ \"[\s\S]*?\"/g, ''); //Trims Citations

                    var popover = $('[data-original-title=' + title + ']');
                    popover.attr("style", "color:#0000EE;");
                    popover.attr("data-content",trimmedString + "...").data('popover');

                }

            }

        }

        let character_array = new Array();
        let comic_array = new Array();
        let div_start;
        let tags;

        for(i = 0; i < jsonData.sidor.length; i++){
            let source = jsonData.sidor[i].innehall;

            for(let j = 0; j < source.length; j++){
                if(source.charAt(j) == '>'){
                    div_start = j;
                }
                else if(source.charAt(j) == '<' && div_start != null){
                    tags = source.substring(div_start+1, j);
                }

                if(tags == 'Character'){
                   character_array.push(jsonData.sidor[i].titel);
                }
                else if(tags == 'Comic'){
                    comic_array.push(jsonData.sidor[i].titel);
                }
                    
                tags = null;
            }
            div_start = null;
            tags = null;
        }

        character_array.sort();
        comic_array.sort();

        new addItemsIntoDropdown('character_dropdown', character_array);
        new addItemsIntoDropdown('comic_dropdown', comic_array);

        function addItemsIntoDropdown(list, array){
            let dropdown = document.getElementById(list);
        
            for(let i = 0; i < array.length; i++){
                
                let a = document.createElement('a');
                let linkText = document.createTextNode(array[i]);
                a.appendChild(linkText);
                a.title = array[i];
                a.className = "dropdown-item";
                a.href = "/Wiki/" + array[i];
                dropdown.appendChild(a);

            }
        }
        
        
    }

};

