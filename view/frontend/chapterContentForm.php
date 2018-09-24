<form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
    <textarea class="dynamic-form" id="comment" name="comment" placeholder="Ajouter un commentaire" required=""></textarea>
    <button class="light-blue-button white-border" type="submit">Valider</button>
</form>