$(document).ready(function(){
    var API_KEY="AIzaSyBYYZxlP8Oa8kx7iyC1tj2WHI0tzGl_Tqo"
    $("#form").submit(function(event){
        event.preventDefault()
        alert ("form is submitted")

        var search=$("#search").val()

        var video = ' '

       

        

        videoSearch(API_KEY,10,search)

    })

    function videoSearch(key,max,search){
        $.get("https://www.googleapis.com/youtube/v3/search?key="+ key + "&type=video&part=snippet&max="+ max + "&q=" + search, function(data){
            console.log(data)
            data.items.forEach(item=>{
                video=  `
                <iframe width="560" height="315" src="https://www.youtube.com/embed/${item.id.videoID}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                `
               $("#videos").append(video)
                          })
        })
    
    }
    

})