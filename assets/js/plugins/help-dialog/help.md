##### Markdown (Grundläggande syntax)

## Rubriker

```no-highlight
# H1
## H2
### H3
#### H4
##### H5
###### H6

Alternativt, för H1 och H2:

Alt-H1
======

Alt-H2
------
```

# H1
## H2
### H3
#### H4
##### H5
###### H6

Alternativt, för H1 och H2:

Alt-H1
======

Alt-H2
------



## Betoning

```no-highlight
Betoning, alias kursiv, med *asterisker* eller _understreck _.

Stark betoning, alias fetstil, med **asterisker** eller __underscores__.

Kombinerad betoning med **asterisker och _underscores_**.

Struken text. ~~Ser ut så här.~~
```

Betoning, alias kursiv, med *asterisker* eller _understreck _.

Stark betoning, alias fetstil, med **asterisker** eller __underscores__.

Kombinerad betoning med **asterisker och _underscores_**.

Struken text. ~~Ser ut så här.~~


<a name="lists"/>

## Listor

(I det här exemplet visas ledande och efterföljande utrymmen med punkter: ⋅)

```no-highlight
1. Först ordnade listobjekt
2. En annan punkt
⋅⋅* Oordnad underlista. 
1. Faktiska nummer spelar ingen roll, bara att det är ett nummer
⋅⋅1. Ordnad underlista
4. En annan punkt.

⋅⋅⋅Du kan ha korrekt indragna stycken i listobjekt. Lägg märke till den tomma linjen ovan och de ledande utrymmena (minst en, men vi använder tre här för att också anpassa den råa markeringen).

⋅⋅⋅För att ha en radbrytning utan ett stycke, måste du använda två avslutande blanksteg.⋅⋅
⋅⋅⋅Observera att den här raden är separat men inom samma stycke.⋅⋅
⋅⋅⋅(Detta strider mot det typiska GFM-linjebruddbeteendet, där efterföljande blanksteg inte krävs.)

* Oordnad lista kan använda asterisker
- Eller minus
+ Eller plus
```

1. Först ordnade listobjekt
2. En annan punkt
    * Oordnad underlista. 
1. Faktiska nummer spelar ingen roll, bara att det är ett nummer
    1. Ordnad underlista
4. En annan punkt.

   Du kan ha korrekt indragna stycken i listobjekt. Lägg märke till den tomma linjen ovan och de ledande utrymmena (minst en, men vi använder tre här för att också anpassa den råa markeringen).

   För att ha en radbrytning utan ett stycke, måste du använda två avslutande blanksteg.  
   Observera att den här raden är separat men inom samma stycke.  
   (Detta strider mot det typiska GFM-linjebruddbeteendet, där efterföljande blanksteg inte krävs.)

* Ordnad lista kan använda asterisker
- Eller minus
+ Eller plus

<a name="links"/>

## Länkar

Det finns två sätt att skapa länkar.

```no-highlight
[Jag är en inline-stil länk](https://www.google.com)

[Jag är en inline-stil länk med en titel](https://www.google.com "Google's Hemsida")

[Jag är en länk till referensstil][Godtycklig skiftlägesokänslig referenstext]

[Jag är en relativ referens till en arkivfil](../blob/master/LICENSE)

[Du kan använda siffror för definitioner av referensstilslänkar][1]

Eller lämna det tomt och använd [en länk till texten själv].

URL-adresser och URL-adresser i vinkelparenteser förvandlas automatiskt till länkar.
http://www.example.com eller <http://www.example.com> och ibland
example.com (men inte på Github till exempel).

Lite text för att visa att referenslänkar kan följa senare.

[godtycklig skiftlägesokänslig referenstext]: https://www.mozilla.org
[1]: http://slashdot.org
[länka texten själv]: http://www.reddit.com
```

[Jag är en inline-stil länk](https://www.google.com)

[Jag är en inline-stil länk med en titel](https://www.google.com "Google's Hemsida")

[Jag är en länk till referensstil][Godtycklig skiftlägesokänslig referenstext]

[Jag är en relativ referens till en arkivfil](../blob/master/LICENSE)

[Du kan använda siffror för definitioner av referensstilslänkar][1]

Eller lämna det tomt och använd [en länk till texten själv].

URL-adresser och URL-adresser i vinkelparenteser förvandlas automatiskt till länkar.
http://www.example.com eller <http://www.example.com> och ibland
example.com (men inte på Github till exempel).

Lite text för att visa att referenslänkar kan följa senare.

[godtycklig skiftlägesokänslig referenstext]: https://www.mozilla.org
[1]: http://slashdot.org
[länka texten själv]: http://www.reddit.com

<a name="images"/>

## Bilder

```no-highlight
Här är en logotyp (håll muspekaren för att se titeltexten):

Inline-stil: 
![alt text](https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Titel Text 1")

Referens-stil: 
![alt text][logo]

[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Titel Text 2"
```

Här är en logotyp (håll muspekaren för att se titeltexten):

Inline-stil: 
![alt text](https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Titel Text 1")

Referens-stil: 
![alt text][logo]

[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Titel Text 2"

<a name="code"/>

## Kod och syntaxmarkering

Kodblock är en del av Markdown-specifikationen, men syntaxmarkering är inte. Många återgivare - som Github och * Markdown Here * - stöder emellertid syntaxbelysning. Vilka språk som stöds och hur dessa språknamn ska skrivas kommer att variera från återgivare till återgivare. * Markdown Here * stöder markering för dussintals språk (och inte riktigt-språk, som diff och HTTP-rubriker); För att se hela listan och hur man skriver språknamnen, se [highlight.js demosida] (http://softwaremaniacs.org/media/soft/highlight/test.html).

```no-highlight
Den inbyggda `koden` har `bakre fästingar runt` den.
```

Den inbyggda `koden` har `bakre fästingar runt` den.

Kodblock är antingen inhägnad av linjer med tre bakre fästingar <kod> `` </code>, eller är indragna med fyra mellanslag. Jag rekommenderar att du bara använder de inhägnade kodblocken - de är enklare och bara de stöder syntaxbelysning.

<pre lang="no-highlight"><code>```javascript
var s = "JavaScript syntax highlighting";
alert(s);
```
 
```python
s = "Python syntax highlighting"
print s
```
 
```
Inget språk anges, så ingen syntaxmarkering. 
Men låt oss kasta in en &lt;b&gt;tag&lt;/b&gt;.
```
</code></pre>



```javascript
var s = "JavaScript syntax highlighting";
alert(s);
```

```python
s = "Python syntax highlighting"
print s
```

```
Inget språk anges, så ingen syntaxmarkering.
Men låt oss kasta in en <b>tag</b>.
```


<a name="tables"/>

## Tabeller

Tabeller är inte en del av den grundläggande Markdown-specifikationen, men de ingår i GFM och * Markdown Here * stöder dem. De är ett enkelt sätt att lägga till tabeller till din e-post - en uppgift som annars skulle kräva kopiering och klistra in från ett annat program.

```no-highlight
Kolumner kan användas för att justera kolumner.

| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |

Det måste finnas minst 3 streck som skiljer varje huvudcell.
Ytterrören (|) är valfria, och du behöver inte göra
rå Markdown ställer sig vackert. Du kan också använda inline Markdown.

Markdown | Less | Pretty
--- | --- | ---
*Still* | `renders` | **nicely**
1 | 2 | 3
```

Kolumner kan användas för att justera kolumner.

| Tables        | Are           | Cool |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |

Det måste finnas minst 3 streck som skiljer varje huvudcell. De yttre rören (|) är valfria, och du behöver inte göra den råa Markdown-linjen vacker. Du kan också använda inline Markdown.

Markdown | Less | Pretty
--- | --- | ---
*Still* | `renders` | **nicely**
1 | 2 | 3

<a name="blockquotes"/>

## Blockquotes

```no-highlight
> Blockquotes är mycket praktiska i e-post för att emulera svartext.
> Denna linje är en del av samma citat.

Citat paus.

> Detta är en mycket lång rad som fortfarande kommer att citeras ordentligt när den lindas. Åh pojke, låt oss fortsätta skriva för att se till att det här är tillräckligt länge för att faktiskt lindra för alla. Åh, du kan *lägga* **Markdown** i en block offert. 
```

> Blockquotes är mycket praktiska i e-post för att emulera svartext.
> Denna linje är en del av samma citat.

Citat paus.

> Detta är en mycket lång rad som fortfarande kommer att citeras ordentligt när den lindas. Åh pojke, låt oss fortsätta skriva för att se till att det här är tillräckligt länge för att faktiskt lindra för alla. Åh, du kan *lägga* **Markdown** i en block offert.  

<a name="html"/>

## Inline HTML

Du kan också använda rå HTML i din Markdown, och det fungerar oftast ganska bra. 

```no-highlight
<dl>
  <dt>Definition list</dt>
  <dd>Is something people use sometimes.</dd>

  <dt>Markdown in HTML</dt>
  <dd>Does *not* work **very** well. Use HTML <em>tags</em>.</dd>
</dl>
```

<dl>
  <dt>Definition list</dt>
  <dd>Is something people use sometimes.</dd>

  <dt>Markdown in HTML</dt>
  <dd>Does *not* work **very** well. Use HTML <em>tags</em>.</dd>
</dl>

<a name="hr"/>

## Horisontell brytning

```
Tre eller fler...

---

Bindestreck 

***

Asterisker 

___

Streck
```

Tre eller fler...

---

Bindestreck

***

Asterisker 

___

Streck


##### Tangentbordsgenvägar

> Om artikelredigeraren är markerad, så kan du använda dessa tangentbordsgenvägar nedan.
    
| Tangentbordsgenvägar                            | Beskrivning                                                                     |
| :---------------------------------------------- |:--------------------------------------------------------------------------------|
| F9                                              | Växla visa/inte visa                                                            |
| F10                                             | Fullständig förhandsgranskning av HTML (Tryck Shift + ESC för att avsluta)      |
| F11                                             | Växla till helskärm (tryck ESC för att avsluta)                                 |
| Ctrl + 1~6 / Command + 1~6                      | Infoga rubrik 1~6                                                               |
| Ctrl + A / Command + A                          | Välj alla                                                                       |
| Ctrl + B / Command + B                          | Infoga fetstil                                                                  |
| Ctrl + D / Command + D                          | Infoga datuom                                                                   |
| Ctrl + E / Command + E                          | Infoga &#58;emoji&#58;                                                          |
| Ctrl + F / Command + F                          | Börja söka                                                                      |
| Ctrl + G / Command + G                          | Hitta nästa sökresultat                                                         |
| Ctrl + H / Command + H                          | Sätt in horisontell linje                                                       |
| Ctrl + I / Command + I                          | Infoga kursiv                                                                   |
| Ctrl + K / Command + K                          | Ingoga inline-kod                                                               |
| Ctrl + L / Command + L                          | Infoga länk                                                                     |
| Ctrl + U / Command + U                          | Sätt in oordnad lista                                                           |
| Ctrl + Q                                        | Byt code fold                                                                   |
| Ctrl + Z / Command + Z                          | Ångra                                                                           |
| Ctrl + Y / Command + Y                          | Göra om                                                                         |
| Ctrl + Shift + A                                | Infoga &#64;länk                                                                |
| Ctrl + Shift + C                                | Ingoga inline-kod                                                               |
| Ctrl + Shift + E                                | Öppna emojidialog                                                               |
| Ctrl + Shift + F / Command + Option + F         | Ersätt                                                                          |
| Ctrl + Shift + G / Shift + Command + G          | Hitta tidigare sökresultat                                                      |
| Ctrl + Shift + H                                | Öppna HTML Entities-dialog                                                      |
| Ctrl + Shift + I                                | Infoga bild &#33;[]&#40;&#41;                                                   |
| Ctrl + Shift + K                                | Infoga TeX(KaTeX) symboler &#36;&#36;TeX&#36;&#36;                              |
| Ctrl + Shift + L                                | Öppna länk dialog                                                               |
| Ctrl + Shift + O                                | Infoga ordnad lista                                                             |
| Ctrl + Shift + P                                | Öppna förformaterad textdialog                                                  |
| Ctrl + Shift + Q                                | Infoga blockquotes                                                              |
| Ctrl + Shift + R / Shift + Command + Option + F | Ersätt alla                                                                     |
| Ctrl + Shift + S                                | Infoga genomsträckt                                                             |
| Ctrl + Shift + T                                | Öppna tabelldialogen                                                            |
| Ctrl + Shift + U                                | Markerad text som konverteras till versaler                                     |
| Shift + Alt + C                                 | Infoga kodblock (```)                                                           |
| Shift + Alt + H                                 | Öppna hjälpdialog                                                               |
| Shift + Alt + L                                 | Markerad text som konvertera till gemener                                       |
| Shift + Alt + P                                 | Infoga sidbrytning                                                              |
| Alt + L                                         | Urvalstext konvertera till gemener                                              |
| Shift + Alt + U                                 | Markeringsord första bokstaven konverterar till versaler                        |
| Ctrl + Shift + Alt + C                          | Öppna dialogrutan för kodblock                                                  |
| Ctrl + Shift + Alt + I                          | Öppna bilddialogen                                                              |
| Ctrl + Shift + Alt + U                          | Urvalstext första bokstaven konverteras till versaler                           |
| Ctrl + Alt + G                                  | Gå till linjen                                                                  |

##### Emoji referens

- [Github emoji](http://www.emoji-cheat-sheet.com/ "Github emoji")
- [Twitter Emoji \(Twemoji\)](http://twitter.github.io/twemoji/preview.html "Twitter Emoji \(Twemoji\)")
- [FontAwesome icons emoji](http://fortawesome.github.io/Font-Awesome/icons/ "FontAwesome icons emoji")

##### Flowchart referens

[http://adrai.github.io/flowchart.js/](http://adrai.github.io/flowchart.js/)

##### SequenceDiagram referens

[http://bramp.github.io/js-sequence-diagrams/](http://bramp.github.io/js-sequence-diagrams/)

##### TeX/LaTeX referens

[http://meta.wikimedia.org/wiki/Help:Formula](http://meta.wikimedia.org/wiki/Help:Formula)
