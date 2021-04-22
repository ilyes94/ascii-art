$(document).ready(function(){
    //Afficher dans explore.php
    $("#liste_ascii button").click( function(){
        $("#affichage").load("ascii_art/"+$(this).attr('name')+".txt");
    })
    //Afficher dans modif.php
    $("#liste_modif").change( function(){
        displayModifAscii();
        $("#nModif").val($('#liste_modif').val());
        $("#nModif").css('textTransform', 'capitalize');
        $("#modif").load("ascii_art/"+$('#liste_modif').val()+".txt");
    })
})

function displayModifAscii(){
    $('#ascii_modif').html(
        '<div class="form-group">' +
            '<label>Noveau nom</label>' +
            '<input id="nModif" class="form-control" type="text" name="newname" placeholder="Nouveau nom" required>' +
        '</div>' +
        '<label>Modifier l\'ASCII</label>' + 
        '<div class="form-group">'+ 
            '<textarea id="modif" rows="15" class="form-control" name="newascii" placeholder="">' +
            '</textarea>' +
        '</div>');
        
}
