(function(){
    var factory = function (exports) {
        var lang = {
            name : "sv",
            description : "Markdown-redigerare",
            tocTitle    : "Innehållsförteckning",
            toolbar : {
                undo             : "Ångra(Ctrl+Z)",
                redo             : "Göra om(Ctrl+Y)",
                bold             : "Fetstilt",
                del              : "Genomstruken",
                italic           : "Kursiv",
                quote            : "Citat",
                ucwords          : "Ordets första bokstav konverterar till versaler",
                uppercase        : "Valdtext som konverteras till versaler",
                lowercase        : "Valdtext som konverteras till gemener",
                h1               : "Rubrik 1",
                h2               : "Rubrik 2",
                h3               : "Rubrik 3",
                h4               : "Rubrik 4",
                h5               : "Rubrik 5",
                h6               : "Rubrik 6",
                "list-ul"        : "Oordnad lista",
                "list-ol"        : "Ordnad lista",
                hr               : "Horisontell linje",
                link             : "Länk",
                "reference-link" : "Referenslänk",
                image            : "Bild",
                code             : "Kod",
                "preformatted-text" : "Förformaterad text / Kodblock",
                "code-block"     : "Kodblock (Flera språk)",
                table            : "Tabeller",
                datetime         : "Datum och Tid",
                emoji            : "Emoji",
                "html-entities"  : "HTML Entities",
                pagebreak        : "Sidbrytning",
                watch            : "Sluta visa",
                unwatch          : "Visa",
                preview          : "HTML Förhandsvisning (Tryck Shift + ESC för att avsluta)",
                fullscreen       : "Fullskärm (Tryck ESC för att avsluta)",
                clear            : "Rensa",
                search           : "Sök",
                help             : "Hjälp",
                info             : "Om " + exports.title
            },
            buttons : {
                enter  : "OK",
                cancel : "Avbryt",
                close  : "Stäng"
            },
            dialog : {
                link : {
                    title    : "Länk",
                    url      : "Adress",
                    urlTitle : "Titel",
                    urlEmpty : "Error: Vänligen fyll i länkadressen."
                },
                referenceLink : {
                    title    : "Referenslänk",
                    name     : "Namn",
                    url      : "Adress",
                    urlId    : "ID",
                    urlTitle : "Titel",
                    nameEmpty: "Error: Referensnamnet kan inte vara tomt.",
                    idEmpty  : "Error: Vänligen fyll i referenslänk-id.",
                    urlEmpty : "Error: Vänligen fyll i referenslänkens adress."
                },
                image : {
                    title    : "Bild",
                    url      : "Adress",
                    link     : "Länk",
                    alt      : "Titel",
                    uploadButton     : "Ladda upp",
                    imageURLEmpty    : "Error: bildadressadressen kan inte vara tom.",
                    uploadFileEmpty  : "Error: ladda upp bilder kan inte vara tomma!",
                    formatNotAllowed : "Error: tillåter bara att ladda upp bilder fil, ladda upp tillåtet bildfil format:"
                },
                preformattedText : {
                    title             : "Förformaterad text / Koder", 
                    emptyAlert        : "Error: Vänligen fyll i den förformaterade texten eller innehållet i koderna.",
                    placeholder       : "koder nu..."
                },
                codeBlock : {
                    title             : "Kodblock",         
                    selectLabel       : "Språk: ",
                    selectDefaultText : "välj ett kodspråk...",
                    otherLanguage     : "Andra språk",
                    unselectedLanguageAlert : "Error: Välj kodspråk.",
                    codeEmptyAlert    : "Error: Vänligen fyll i kodinnehållet.",
                    placeholder       : "kodar nu...."
                },
                htmlEntities : {
                    title : "HTML-enheter"
                },
                help : {
                    title : "Hjälp"
                }
            }
        };
        
        exports.defaults.lang = lang;
    };
    
	// CommonJS/Node.js
	if (typeof require === "function" && typeof exports === "object" && typeof module === "object")
    { 
        module.exports = factory;
    }
	else if (typeof define === "function")  // AMD/CMD/Sea.js
    {
		if (define.amd) { // for Require.js

			define(["editormd"], function(editormd) {
                factory(editormd);
            });

		} else { // for Sea.js
			define(function(require) {
                var editormd = require("../editormd");
                factory(editormd);
            });
		}
	} 
	else
	{
        factory(window.editormd);
	}
    
})();