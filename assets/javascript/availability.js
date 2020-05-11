

$(document).ready(function(){

    if($('#project-id').val() && $('#project-id').val()!='')
    {
        var project_id = $('#project-id').val();
        getPlotAvailability(project_id);
    }
});
function getPlotAvailability(project_id)
{

    $.ajax({
        url:base_url +'get-plot ',
        type:'post',
        data:{project_master_id:project_id},
        success:function(response)
        {
            console.log(response);
            if(response.status == 'success')
            {
                if(response.data.length > 0)
                {
                    var plot_availability='';
                var differ_class='';
                $.each(response.data,function (key,value){

                    if(value.availability == 'Booked')
                    {
                        differ_class ='bg-primary';
                    } else if(value.availability == 'Registry')
                    {
                        differ_class ='bg-warning';
                    }else if(value.availability == 'Free')
                    {
                        differ_class ='bg-success';
                    }else if(value.availability == 'Alloted')
                    {
                        differ_class ='bg-danger';
                    }else if(value.availability == 'Hold')
                    {
                        differ_class ='bg-colored2';
                    }
                    plot_availability+= '<div class="col-md-2 col-sm-6 col-6 sm-mt">\n\
                                    <span class="stay icon-xl radius white m-auto font-22 '+differ_class+' ">'+value.name+'</span>\n\
                                    </div>';

                });

                $('#plot-availability').html(plot_availability);

                }
                else
                {
                    var error = '<div class="col-md-2 col-sm-6 col-6 sm-mt bg-warning ">No Plots Available\n\
                    </div>'
                    $('#plot-availability').html(error);
                }
                
            }

        }
    
    })

}