<?php
echo
'<img id="logo" class="decorate-img" src="/assets/img/logo.png" alt="Logo of the website : Roi Brioche"/>
<img id="cookies" class="decorate-img" src="/assets/img/cookies.png" alt="Decoration image representing three cookies"/>
<img id="donut" class="decorate-img" src="/assets/img/donut.png" alt="Decoration image representing a donut"/>

<main>
    <h1>Ajout du commentaire</h1>

        <form action=/commentaire/commenter/' . $A_vue['id_Recette'] . ' method="POST">
            <a id="back-arrow" href="/"><img src="/assets/img/arrow-back-outline.svg" alt="Arrow to return to the home of the website"/></a>
    
            <div>
                <label>Note</label>
                <input type="range" name="note" min="1" max="5" value="3" step="0.5" oninput="this.nextElementSibling.value = this.value">
                <output>3</output>
            </div>
            
            <label>Commentaire</label>
            <textarea name="commentaire" id="commentaire"></textarea>

            <button id="validate" type="submit">Valider</button>
        </form>
        
    </main>
</main>

<p id="copyright-text">Copyright © Tous droits réservés Roi Brioche - 2023</p>';
