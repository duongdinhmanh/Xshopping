$(document).ready(function() {

   $(document).on('click','.del_item', function(){
         var $this = $(this);
       if (del_pro('you really want to delete..?')==true) {
            var url_del = $(this).attr('href_page');
            var id = $(this).attr('id')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url_del,
                dataType: "JSON",
                data:{'id': id},
                success: function(result){
                    if (result == 'success') {
                        alert('message');
                     }
                }
            }).done(function(){
                $this.closest("tr").find(".status>button").removeClass('btn-success');
                $this.closest("tr").find(".status>button").addClass('btn-warning').text('hidden');

                $this.removeClass('btn-warning del_item');
                 var id = $this.attr('id');
                $this.addClass('btn-success show_item').html('<i class="fa fa-eye"  style="padding: 3px"></i>').attr({
                    title: 'show item',
                    href_page: 'http://localhost/admin/sub-category-show/'+id
                });

            });
        }
    });

});

$(document).ready(function() {
      $(document).on('click', '.show_item',function(){
            var $this = $(this);
           if (del_pro('you really want to show item..?')==true) {
                var url_show = $(this).attr('href_page');
                var id = $(this).attr('id')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: url_show,
                    dataType: "JSON",
                    data:{'id': id},
                    success: function(result){
                        if (result == 'success') {
                            alert('message');
                         }
                    }
                }).done(function(){
                    $this.closest("tr").find(".status>button").removeClass('btn-warning');
                    $this.closest("tr").find(".status>button").addClass('btn-success ').text('current');

                    $this.removeClass('btn-success show_item');
                    var id = $this.attr('id');
                    $this.addClass('btn-warning del_item').html(' <i class="fa fa-eye-slash" style="padding: 3px"></i>').attr({
                        title: 'delete item',
                        href_page: 'http://localhost/admin/category-del/'+id
                    });
                })
            }
    });


});
