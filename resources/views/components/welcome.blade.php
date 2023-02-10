<!doctype html>
<html lang="en">

<head>
  <title>Naxum Admin - Abdulmutalib Amoka</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (Auth::check())
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");:root{
      --header-height: 3rem;
      --nav-width: 68px;
      --first-color: cornflowerblue;
      --first-color-light: rgb(174, 191, 222);
      --white-color: #F7F6FB;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}
      body{
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
      }
      a{
        text-decoration: none
      }
      .header{
          width: 100%;
          height: var(--header-height);
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 0 1rem;
          background-color: var(--white-color);
          z-index: var(--z-fixed);
          transition: .5s
      }
      .header_toggle{
          color: var(--first-color);
          font-size: 1.5rem;cursor: pointer
      }
      .header_icon{
          width: 35px;
          height: 35px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-content: center;
          border-radius: 50%;
          background-color: cornflowerblue;
          cursor: pointer;
      }
      .header_icon span{
          font-size: 40px;
          vertical-align: middle;
          line-height: 80%;
          color: #F7F6FB;
          text-align: center;
      }
      .l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color: var(--first-color);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}
      .nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}
      .nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}
      .nav_logo{margin-bottom: 2rem}.nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}
      .nav_logo-name{color: var(--white-color);font-weight: 700}
      .nav_link{position: relative;color: var(--first-color-light);margin-bottom: 1.5rem;transition: .3s}
      .nav_link:hover{color: var(--white-color)}
      .nav_icon{font-size: 1.25rem}.show{left: 0}
      .body-pd{padding-left: calc(var(--nav-width) + 1rem)}
      .active{color: var(--white-color)}
      .active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}
      .height-100{height:100vh}
      @media screen and (min-width: 768px){
          body{
              margin: calc(var(--header-height) + 1rem) 0 0 0;
              padding-left: calc(var(--nav-width) + 2rem)
          }
          .header{
              height: calc(var(--header-height) + 1rem);
              padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
          }
          .header_icon{
              width: 40px;
              height: 40px;
              background: cornflowerblue;
          }
          .header_icon p{
              font-size: 45px
          }
          .l-navbar{
              left: 0;padding: 1rem 1rem 0 0
          }
          .show{
              width: calc(var(--nav-width) + 156px)
          }
          .body-pd{
          padding-left: calc(var(--nav-width) + 188px)
          }
      }
    </style>
    @endif
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    

</head>

<body id="body-pd">
  
  <header>
    <!-- place navbar here -->
    @if (Auth::check())
    <!-- admin is logged in -->
    @include('layouts.partials.navbar')
    @endif
  </header>
  <main>
    {{$slot}}
  </main>
  
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{ asset('js/test.js') }}"></script>
</body>

</html>