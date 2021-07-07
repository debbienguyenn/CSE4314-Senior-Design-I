$(document).ready(function(){
    var API_KEY="AIzaSyBYYZxlP8Oa8kx7iyC1tj2WHI0tzGl_Tqo"
    $("#form").submit(function(event){
        event.preventDefault()
        alert ("Loading your searched videos")

        var video=''

        var search=$("#search").val()

        videoSearch(API_KEY,search,10)

    })

    function videoSearch(key,search,max){
        
        $("#videos").empty()

        $.get("https://www.googleapis.com/youtube/v3/search?key="+ key + "&type=video&part=snippet&max="+ max + "&q=" + search, function(data){
            console.log(data)
            data.items.forEach(item=>{
                video=  `
                <iframe width="300" height="250" src="https://www.youtube.com/embed/${item.id.videoId}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                `
            
               $("#videos").append(video)
                          })
        })
    
    }
    
})