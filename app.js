$(document).ready(function() {
      $(".carousel-item").first().addClass("active")



      var bolum = $("#bolum").val()
      // DUYURULAR GÜNCELLEME
      setInterval(function(){
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{duyuru:"1",bolum:bolum},
                  success:function(result){
                        if(result.duyuru==$(".duyuru").val() || result=="0")
                        {
                        }
                        else
                        {
                              $("#duyuru").append("-"+ result.duyuru)
                              $(".duyuru").val(result.duyuru)
      
                        }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{etkinlik:"1",bolum:bolum},
                  success:function(result){
                        if(result.etkinlik==$("#etkinlik").val() || result=="0")
                        {
                        }
                        else
                        {
                              $(".etkinlikler").last().after("<li class='etkinlikler'>"+result.etkinlik+"</li>")
                              $("#etkinlik").val(result.etkinlik)
      
                        }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            // console.log($(".videolar").last().attr("src"))
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{video:"1",bolum:bolum},
                  success:function(result){
                        if("admin/admin/video/"+result.link==$(".videolar").last().attr("src") || result=="0")
                        {
                        }
                        else
                        {
                              $(".carousel-item").last().after('<div class="carousel-item"><div class="view"><video class="video-fluid" autoplay loop muted><source class="videolar" src="admin/admin/video/'+ result.link +'" type="video/mp4" /></video></div><div class="carousel-caption"><div class="animated fadeInDown"><p class="aciklama" >'+ result.aciklama +'</p></div></div></div>')

      
                        }

                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{resim:"1",bolum:bolum},
                  success:function(result){
                        if("admin/admin/resim/"+result.resim==$(".resim").last().attr("src") || result=="0")
                        {
                        }
                        else
                        {
                              $(".carousel-item").last().after('<div class="carousel-item"><div class="view"><img class="d-block w-100 olcu resim" src="admin/admin/resim/'+ result.resim +'"alt="Second slide"></div><div class="carousel-caption"><div class="animated fadeInDown"><p class="aciklama" >'+ result.aciklama +'</p></div></div></div>')

      
                        }

                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{ders:"1",bolum:bolum},
                  success:function(result){
                        if(result.img==$("#dersprg").attr("src") || result=="0")
                        {
                        }
                        else
                        {
                              console.log("sa")
                              $("#dersprg").attr("src",result.img)      
      
                        }

                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
        },1000);
      //   DUYURULAR GÜNCELLEME 

















































  console.log(moment.locale("tr"))
    function scroll() {
      $('#events ol li:first').slideUp(function() {
        $(this).show().parent().append(this);
      });
    }
    setInterval(scroll, 2000);
  
    $(document).ready (function(){
  
        function getData(){
            
        var url = "http://api.openweathermap.org/data/2.5/weather?q=trabzon,tr&APPID=0e8673889e563e65952c252f7e44dd7a&units=metric";
      
        var latitude;
        var longitude;
        var havaDurumUrl;

      
          

         havaDurumUrl = (url);
                $.ajax({
                      url:havaDurumUrl,
                  dataType:'json',
                      success: function(result){
                        console.log(result)
                          $("#sehir").text(result.name);
                          $("#nem").text(result.main.humidity);
                          $("#ruzgar").text(result.wind.speed+" MPH");
                          $("#degree").text(Math.ceil(result.main.temp)+ "°C");

                        //   $("#country").text(result.sys.country);
                        //   $("#durum").text(result.weather[0].main);
                        //   $("#wind").text(result.wind.speed);
                        //   $("#gun").text(moment().format('LL'));
                        //   $("#weatherIcon").html("<img src= weatherIcon>" );
                        //   $("#tempMin").text(result.main.temp_min);
            
                      
                
            var havaresmi = result.weather[0].main;
            console.log(result)

          switch(havaresmi){
             case 'Clouds':
                    day = "bulutludur";
                   $("#img").attr("src","https://image.flaticon.com/icons/svg/149/149209.svg");
                    break;
             case 'Rain':
                    day = "yağmurludur";
              $("#img").attr("src","https://image.flaticon.com/icons/svg/131/131041.svg");
                    break;
              case 'Clear':
                    day = "açık";
              $("#img").attr("src","https://image.flaticon.com/icons/svg/606/606795.svg");
                    break;
                case 'Thunderstorm':
                    day = "şimşek";
              $("#img").attr("src","https://image.flaticon.com/icons/svg/1146/1146921.svg");
                    break;
        }   
                      }
                  });
            
         
        }
        getData();
        
      
        });
       

  
});




