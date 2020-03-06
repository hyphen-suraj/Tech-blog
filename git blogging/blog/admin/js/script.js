CKEDITOR.replace( 'editor1' );



$(document).ready(function(){

    $('#selectAll').click(function(event){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;

            });

        }
        else{
            $('.checkbox').each(function(){
                this.checked = false;
            });

        }

    });

    


});
