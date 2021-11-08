<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./assets/img/favicon/icon_zing_mp3.png" type="image/x-icon" />
        <title>Truyện Sách</title>
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">



        <style>
          a{
            text-align : center;
            text-decoration: none;
            color: #232323;
          }
          a:hover {
              color: #077dca;
            }



          
          .switch_color{
            background-color: #232323;
            background-repeat: repeat;
            color: rgba(255,255,255,0.6); 
          }

          .switch_color_text{
            background-color: #232323;
            background-repeat: repeat;
            color: #000; 
          }
           
        </style>
        
    </head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">DocTruyen.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/xem-sach')}}">Sách <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh Mục Truyện
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($danhmuc as $key => $danh)
                        <a class="dropdown-item" href="{{url('/danh-muc/'.$danh->slug_danhmuc)}}">{{ $danh->tendanhmuc}}</a>
                        @endforeach
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thể Loại
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                        @foreach($theloai as $key => $the)
                            <a class="dropdown-item" href="{{url('/the-loai/'.$the->slug_theloai)}}">{{ $the->tentheloai}}</a>
                        @endforeach
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tùy Chỉnh
                    </a>
                    <div class="dropdown-menu dropdown-menu-right ">
                      <form class="form-horizontal">
                        <div class="form-group form-group-sm">
                          <div class="col-sm-5 col-md-7">
                            <select class="form-control custom-select" id="switch_color" style="width : 150px">
                              <option value="xam">Xám nhạt</option>
                              <option value="den">Màu tối</option>
                            </select>
                          </div>
                        </div>
                      </form>
                    </div>
                        
                </li>
                
                </ul>
                <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('/tim-kiem')}}" method="POST">
                  @csrf
                    <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" 
                    placeholder="Tìm Kiếm" aria-label="Search">
                    <div id="search_ajax">
                      
                    </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>
                </form>
            </div>
            
        </nav>
        <div>
            <p class="p-15"> Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục. </p>
        </div>
        <!-- SLiders -->
        @yield('slide')
        

        <!-- end slider -->


        <!-- Sách nên đọc -->
        @yield('content')

        <!-- end Blog -->
   

<!-- Footer -->
<footer class="page-footer font-small blue pt-4 ">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Footer Content</h5>
        <p>Here you can use rows and columns to organize your footer content.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</div>




<script src="{{ asset('js/app.js') }}" defer></script>
<!-- //timkiem ajax -->
<script>
  $('#keywords').keyup(function(){
    var keywords = $(this).val();

    if(keywords != ''){

      var _token = $('input[name = "_token"]').val();

      $.ajax({

        url : "{{url('timkiem-ajax')}}",
        method : "POST",
        data : {keywords : keywords , _token : _token},
        success : function(data){
          $('#search_ajax').fadeIn();
            $('#search_ajax').html(data);
        }
      });
    }else{
      $('#search_ajax').fadeOut();
    }
  });

  $(document).on('click', '.li_search_ajax', function(){  
        var text = $(this).text();
         $("#keywords").val(text);
         $('#search_ajax').fadeOut();  
  });

  
    
</script>


<!-- select option link -->
<script type="text/javascript"> 
      $('.select_chapter').change(function(){
          var url = $(this).val();
          if(url){
            window.location = url;
          }

          return false;
      });

      current_chapter();

      function current_chapter(){
        var url = window.location.href;

        $('.select_chapter').find('option[value = "' + url +'"]').attr("selected" , true);
      }
</script>


<script type="text/javascript">
      $('.select_slider').change(function(){
          var url = $(this).val();
          if(url){
            window.location = url;
          }

          return false;
      });

      current_slider();

      function current_slider(){
        var url = window.location.href;

        $('.select_slider').find('option[value = "' + url +'"]').attr("selected" , true);
      }
</script>

<!-- facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="US1Q8d6I">
</script>


<!-- thay đổi mau nền -->
<script>
  $(document).ready(function(){

      if(localStorage.getItem('switch_color') !== null){
        const data = localStorage.getItem('switch_color');
        const data_obj = JSON.parse(data);

        $(document.body).toggleClass(data_obj.class_1);
        $('.product-title').css('color', 'rgba(255,255,255,0.6)');
      $('a#truyen-thieu-nhi-tab').css('color', 'rgba(255,255,255,0.6)');
        $('ul.mucluctruyen > li > a').css('color', 'rgba(255,255,255,0.6)');

        $("selected option[value == 'den']").attr("selected" ,"selected");//selected = "selected" gawns active
      }



    $('#switch_color').change(function(){
      $(document.body).toggleClass('switch_color');
      $('.product-title').css('color', 'rgba(255,255,255,0.6)');
      $('a#truyen-thieu-nhi-tab').css('color', 'rgba(255,255,255,0.6)');
      $('ul.mucluctruyen > li > a').css('color', 'rgba(255,255,255,0.6)');
      
      if($(this).val() == 'den'){

        var item = { 
          'class_1' : 'switch_color',
          'class_2' : 'switch_color_text'
          }

          localStorage.setItem('switch_color', JSON.stringify(item));
      }
      else if($(this).val() == 'xam'){
        
        localStorage.removeItem('switch_color');

        $('ul.mucluctruyen > li > a').css('color' , '#000');
        $('.product-title').css('color' , '#000');
      $('a#truyen-thieu-nhi-tab').css('color', '#232323');
      }

    });
  });
</script>

<!-- làm phần truyên yêu thích -->
<script>
  show_wishlist();
      function show_wishlist(){
          if(localStorage.getItem('wishlist_truyen')!=null){

             var data = JSON.parse(localStorage.getItem('wishlist_truyen'));

             data.reverse();

             for(i=0;i<data.length;i++){

                var title = data[i].title;
                var img = data[i].img;
                var id = data[i].id;
                var url = data[i].url;

                $('#yeuthich').append(`
                  <div class="row mt-2">
                      <div class="col-md-5">
                          <a href="`+url+`">
                              <img class="img img-responsive" src="`+img+`" alt="`+title+`" width="100%">
                          </a>
                          
                      </div>
                      <div class="col-md-7">
                          <a href="`+url+`">
                              <p>`+title+`</p>
                          </a>
                          
                      </div>
                  </div>
            `);
            }

          }
      }




  $('.btn-thich_truyen').click(function(){
    $('.fa.fa-heart').css('color','red');
        const id = $('.wishlist_id').val();
        const title = $('.wishlist_title').val();
        const url = $('.wishlist_url').val();
        const img = $('.wishlist_img').attr('src');
        // alert(id);
        // alert(title);
        // alert(url);
        // alert(img);

        const item = {
          'id': id,
          'title': title,
          'img': img,
          'url': url
        }

        if(localStorage.getItem('wishlist_truyen')==null){
           localStorage.setItem('wishlist_truyen', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));//đẩy dât vào cái wishlist_truyen[] rỗng k cần tạo thêm Storage
        
        //so sanhs const id = $('.wishlist_id').val(); với id trong Storage nó có trùng nhau k
        var matches = $.grep(old_data ,function(obj){
            return obj.id == id ;
        })
 
        //Nếu trả về true
        if(matches.length){
            alert('Truyện đã có trong danh sách yêu thích');
        }
        else{
            if(old_data.length<=5){
              old_data.push(item);
            }else{
              alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
            }

            $('#yeuthich').append(`
                  <div class="row mt-2">
                      <div class="col-md-5">
                          <a href="`+url+`">
                              <img class="img img-responsive" src="`+img+`" alt="`+title+`" width="100%">
                          </a>
                          
                      </div>
                      <div class="col-md-7">
                          <a href="`+url+`">
                              <p>`+title+`</p>
                          </a>
                          
                      </div>
                  </div>
            `)

          localStorage.setItem('wishlist_truyen',JSON.stringify(old_data));
          alert('Đã thêm vào danh sách truyện yêu thích');
        }
        localStorage.setItem('wishlist_truyen',JSON.stringify(old_data));

  });
</script>
<!-- làm xem sách nhanh -->

<script>
  $('.xemsachnhanh').click(function(){
    const sach_id = $(this).data('sach_id');
    var _token = $('input[name="_token"]').val();
            $.ajax({
              url : "{{url('xemsachnhanh')}}",
                method:"POST",
                dataType:'JSON',
                data:{_token:_token, sach_id:sach_id},
                success:function(data){
                    $('#tieude_sach').html(data.tieude_sach);
                    $('#noidung_sach').html(data.noidung_sach);
                }

            }); 
  })
</script>


<script>

$('.tabs_danhmuc').click(function(){
    const danhmuc_id = $(this).data('danhmuc_id');
    var _token = $('input[name="_token"]').val();
            $.ajax({
              url : "{{url('tabs-danhmuc')}}",
                method:"POST",

                data:{_token:_token, danhmuc_id:danhmuc_id},
                success:function(data){
                    $('#tab_danhmuctruyen_'+danhmuc_id).html(data);
                }

            }); 
   })

  
</script>
</body>
</html>