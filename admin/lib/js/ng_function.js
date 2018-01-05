$(document).ready(function(){
   $("#variabehide").hide(); 
});


/** fonction bouton back top **/
$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});


//attendre que toute la page soit chargée
$(document).ready(function(){
    $("#gt_carousel").carousel({
        interval:1500,
        pause:false
    });
    //traitement direct de la liste deroulante
    $("#id_gt_type_gateau").change(function(){
        //on releve l'attribut "name" de <select>
       var parametre = $(this).attr('name');
       var val = $(this).val();
       var refresh = 'index.php?' + parametre + '=' + val + '&choix_type=1';
       window.location.href = refresh;
    });
    
    $("#choix_type").remove();
    
    $("#balise3").hide();
    $("#balise1").on(
            'mouseover',function(){
                $("#balise4").css({
                   'color':'red',
                   'font-weight':'bold'
                }),
                $("#balise3").show();
            }
                    
        )
        .on(
            'mouseout', function(){
                $("#balise4").css({
                     'color':'blue',
                   'font-weight':'bold'
                }),
                $("#balise3").hide();
            }
        )
    
    $("#lien1,#lien2,#lien3").hide();
    $("#lien4").click(function(){
       $("#lien1").show(); 
       $("#lien1").hover(function(){
          $("#lien2,#lien3").show(); 
       });
       $("#lien3").hover(function(){
          $("#lien1,#lien2,#lien3").hide(); 
       });
    });
    
    $("#coucou").hide();
    
    $("#clic_couleur").click(function(){
       $(".clic").css("color","red"); 
       $("#coucou").show();
       $("#ajoutclasse").addClass("txtBleu");
    });
});



/** recherche dans un tableau **/
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
