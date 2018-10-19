<form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
    <textarea class="dynamicForm" id="comment" name="comment" placeholder="Ajouter un commentaire" required=""></textarea>
    <button class="blueButton regularButton" type="submit">Valider</button>
</form>