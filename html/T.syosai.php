<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/OyamadaBar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Oyamadatime2.css">
    <link rel="stylesheet" href="../css/T.syosai.css">
</head>
<body>
    <?php
        require_once '../DAO/postdb.php';
        require_once '../DAO/userdb.php';
        $daoPostDb = new DAO_post();
        $daoUserDb = new DAO_userdb();
    ?>
    <div id="app">
    <!-- ヘッダー -->
   <header class="" id="header">
    <div class="container-fluid">
        <div class="row row justify-content-between">
            <div class="d-flex align-items-center mb-0 text-dark text-decoration-none col-7 text-left px-0" style="height: 50px; padding-top: 55px;">
            <img src="../svg/a.svg">
            </div>
    
            <button class="navbar-toggler col-3 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation" style="height: 50px; box-shadow: none;">
                <img src="../svg/b.svg" width="50" height="50" viewBox="0 0 60 60" fill="none" > 
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <form wtx-context="0C9FB6AB-0B58-4B25-A43A-44B7ADC851E5" class="mx-4">
              <input class="form-control text-center mb-3" type="text" placeholder="キーワードを入力" aria-label="Search" wtx-context="AA84657A-0F9B-4A04-B5FA-D24659B477FD"
              style="height: 34px;
              border: 3px solid #FFAC4A; 
              box-shadow: none;">
            </form>
        </div>
    </div>
  </header>
  <!-- ヘッダー↑ -->
 
  <div class="scrollable">
  <div class="container-fluid">
    <div class="row">
        
    <?php
        $postIds = array();
        array_push($postIds,1);
        $userIds = array();
        

        foreach($postIds as $postId){
            $userIds = $daoPostDb->getUserIdsByPostId($postId);
            echo '
            <!-- 投稿のカード -->
            <div class="card">
            <button class="backBtn text-start">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2931 5.29297L15.7073 6.70718L10.4144 12.0001L15.7073 17.293L14.2931 18.7072L7.58596 12.0001L14.2931 5.29297Z" fill="#424242"/>
            </svg>                    
            </button>
                <div class="card-body">
                    <div class="box">
                        <img src="../userImage/main.jpg" class="profielIcon" />
                        <p class="userName">',$daoUserDb->getUserName($userIds),'</p>
                        <p class="userComment">
                        '
                        ,$daoPostDb->getPostDetail($postId),
                        '
                        </p>
                        <section id="image-carousel" class="splide" aria-label="投稿画像">
                        <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                    <img src="../userImage/main.jpg" alt="画像1">
                                    </li>
                                    <li class="splide__slide">
                                    <img src="../userImage/main.jpg" alt="画像2">
                                    </li>
                                    <li class="splide__slide">
                                    <img src="../userImage/main.jpg" alt="画像3">
                                    </li>
                                </ul>
                        </div>
                        </section>

                        
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                            
                                <img :src="image" @click="changeColor()" id="likeButton"></button>
                            
                                <div class="like" id="likeCnt">
                                    ',$daoPostDb->getPostCount($postId),'
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <img src="../svg/comment.svg" id="commentButton">
                                <div class="comment">
                                    0
                                </div>
                            </div>
                        </div>        
                        <button class="detailsBtn navbar-toggler col-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 12L18.5933 0.75H0.406734L9.5 12Z" fill="#D9D9D9"/>
                            </svg>
                            詳細
                        </button>
                        <div class="collapse" id="navbarToggleExternalContent">
                            <P>店名:</P>
                            <P>メニュー:</P>
                            <P>料金 :</P>
                            <P>場所:</P>
                        </div>                   
                    </div>
                </div>
            </div>
            ';
        }
    ?>
   
        <!-- 投稿のカード -->
        <div class="card">
            <div class="card-body">
                <div class="box">
                    <img src="../userImage/main.jpg" class="profielIcon" />
                    <p class="userName">パンダ</p>
                    <p class="userComment">鶏料理専門店に行ってきました50種類の鶏料理があってどれにするか悩んだけれどタイ料理のカオマンガイにしました</p>
                    <img src="../userImage/09_02_khaomankai_06.jpg" class="postImage">
                </div>

                <div class="row row-eq-height">
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <img :src="image" @click="changeColor()" id="likeButton"></button>
                            <div class="like" id="likeCnt">
                                0
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-center">
                            <img src="../svg/comment.svg" id="commentButton">
                            <div class="comment">
                                0
                            </div>
                        </div>
                    </div>                                      
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
    <!-- navigationBar -->
    <div class="border"></div>
 
    <div class="navigation">
     <a class="list-link" href="#" onclick="changeImage(this, 'Oyamadatime.html')">
     <i class="icon">
     <img src="../svg/time2.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage2(this, 'Oyamadaforum.html')">
     <i class="icon">
     <img src="../svg/forum.svg" class="image-size1">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage3(this, 'Oyamadatokou.html')">
     <i class="icon">
     <img src="../svg/post.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage4(this, 'Oyamadaprofile.html')">
     <i class="icon">
     <img src="../svg/profile.svg" class="image-size">
     </i>
     </a>
    </div>

    <!-- splide -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/OyamadaBar.js"></script>
    <script src="../js/time.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
    <script src="../js/T.syosai.js"></script>  

</body>
</html>