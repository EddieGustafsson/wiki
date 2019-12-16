
let xhttp1 = new XMLHttpRequest();

xhttp1.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {

        jsonData = JSON.parse(this.responseText);
        
        let character_array = new Array();
        let cartoon_array = new Array();
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
                else if(tags == 'Cartoon'){
                    cartoon_array.push(jsonData.sidor[i].titel);
                }
                else{
                    tags = null;
                }
                

            }
            div_start = null;
            tags = null;
        }

        character_array.forEach(element => console.log(element));
        //cartoon_array.forEach(element => console.log(element));
        
        
        
        
    }

};