<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    Inställningar
                </div>
                <div class="card-body">
                    <div class="col">
                        <form>
                            <div class="form-group row">
                                <label class="col-xs-6 col-form-label" data-tootik="Formatet för utgångsdata: &#39;sida vid sida&#39; eller &#39;rad för rad&#39;, dvs &#39;dela upp&#39; eller &#39;slå samman&#39; respektive version" data-tootik-conf="left multiline" for="outputFormat">Utmatningsformat: </label>
                                <div class="col-xs-6">
                                    <select class="custom-select" id="outputFormat">
                                    <option value="line-by-line">Rad för rad</option>
                                    <option selected="selected" value="side-by-side">Sida vid sida</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="syncScrollLabel">
                                <div class="custom-control custom-switch" data-tootik="Huruvida du vill bläddra i båda rutorna sida vid sida" data-tootik-conf="left multiline">
                                    <input checked="checked" type="checkbox" id="syncScroll" class="custom-control-input">
                                    <label class="custom-control-label" for="switch1">Synkronisera rullning</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="margin-right:10px;" class="col-xs-6 col-form-label" data-tootik="Den matchande nivån: Rader för matchande rader, ord för matchande rader och ord eller ingen" data-tootik-conf="left multiline" for="matchingType">Matchande typ: </label>
                                <div class="col-xs-6">
                                    <select class="custom-select" id="matchingType">
                                        <option value="lines">Rader</option>
                                        <option selected="selected" value="words">Ord</option>
                                        <option value="none">Ingen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xs-6 col-form-label" data-tootik="Hur många rader i sammanhanget som bör inkluderas" data-tootik-conf="left multiline" for="contextLines">Kontextrader: </label>
                                <div class="col-xs-6">
                                    <input class="form-control" id="contextLines" min="0" type="number" value="3" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="margin-right:20px;" class="col-xs-6 col-form-label" data-tootik="Likhetströskeln för ordmatchning" data-tootik-conf="left multiline" for="contextLines">Ordtröskel: </label>
                                <div class="col-xs-6">
                                    <input class="form-control" id="wordThreshold" max="1" min="0" step="0.05" type="number" value="0.25" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xs-6 col-form-label" data-tootik="Utför högst dessa många jämförelser per rad som matchar ett block med ändringar" data-tootik-conf="left multiline" for="contextLines">Max jämförelser: </label>
                                <div class="col-xs-6">
                                    <input class="form-control" id="maxComparisons" min="0" step="100" type="number" value="2500" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="diff"></div>
    </div>
</div>