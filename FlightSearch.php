

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Airline Seach Portal</title>

    <style>
        .a{
            margin-top:50px;
            font-size: 30px;
        }

    </style>
</head>
<body>
    <style>
    label {
        display: block;
        font: 1rem 'Fira Sans', sans-serif;}
    input,
    label {
        margin: .4rem 0;}
        .kz {
        border: 3px solid black;
      }

    </style>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">AIRLINE SEARCH PORTAL </span>
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <form action="index.html"><button><a class="mr-5 hover:text-gray-900">Home</a></button></form>
            <form action="FlightSearch.php"><button><a class="mr-5 hover:text-gray-900">Flight Search</a></button></form>
            <form action="Admin.html"><button><a class="mr-5 hover:text-gray-900">Admin</a></button></form>
            <!-- <form action="Blog.html"><button><a class="mr-5 hover:text-gray-900">Blog</a></button></form> -->
            <form action="feedback.html"><button><a class="mr-5 hover:text-gray-900">Feedback</a></button></form>
          </nav>
          <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Sign-up
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </header>
      <hr class = "kz">
      
      <section>
      <form name="registration" id="registration"  method="post">
        <span class="border border-dark"></span>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Source</span>
            <input type="text" placeholder="Enter Source" name="Source" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required> 
          </div>
          <label for="start"><h5>🛫Start date:</h2></label>
            <input type="date" id="start" name="trip-start"
       value="2021-05-15"
       min="2021-03-01" max="2023-12-31">

          <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Destination</span>
            <input type="text" placeholder="Enter Destination" name="dest" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required> 
            
          </div>
          <label for="start"><h5>🛬Return date:</h5></label>
          <input type="date" id="start" name="trip-start"
                 value="2021-05-20"
                 min="2021-03-01" max="2023-12-31">
                 <div class="position-relative">
               
                    <div class="position-absolute top-50 start-50 translate-middle"> <p><p><button type="submit" class="btn btn-primary" name="submit">Search Flights</button></p></p></div>
        
                  </div>
    </form>
           
      </section>
    
<?php
    if(isset($_POST['submit']))
    {
        $source = $_POST['Source'];
        $dest = $_POST['dest'];
        $con = mysqli_connect('localhost','root');
        mysqli_select_db($con,'dsa');
    
        $q="select * from airline where SOURCES='$source' and DESTINATION='$dest' and INTERMEDIATE_DESTN is NOT NULL";
    
        $q1="select * from airline where SOURCES='$source' and DESTINATION='$dest' and INTERMEDIATE_DESTN is NULL";
    
        $result=mysqli_query($con,$q);
        $num=mysqli_num_rows($result);
    
        $result1=mysqli_query($con,$q1);
        $num1=mysqli_num_rows($result1);
    
        if($num==1)
        {	
            $int="select INTERMEDIATE_DESTN from airline where SOURCES='$source' and DESTINATION='$dest'";
            $result2=mysqli_query($con,$int);
            $row=mysqli_fetch_array($result2);
           ?> <center><div class="a"> <?php echo "Connecting Flight : \n", $source, '--->', $row['INTERMEDIATE_DESTN'], '--->', $dest; ?></div></center><?php
            
        }
        else if($num1==1)
        {
            ?> <center><div class="a"> <?php echo "Direct Flight : \n," , $source, '--->', $dest; ?></div> </center><?php
        }
        else if($num!=1 && $num1<=0){
            ?> <center><div class="a"> <?php echo "No flight"; ?></div></center><?php
        }
    
        mysqli_close($con);

    }

?>
      <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://source.unsplash.com/722x400/?takeoff" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1>
                  <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                  <div class="flex items-center flex-wrap ">
                    <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>1.2K
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>6
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://source.unsplash.com/721x401/?pilot" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The 400 Blows</h1>
                  <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                  <div class="flex items-center flex-wrap">
                    <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>1.2K
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>6
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://source.unsplash.com/722x400/?aeroplane" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Shooting Stars</h1>
                  <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                  <div class="flex items-center flex-wrap ">
                    <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>1.2K
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>6
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
          <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24"> -->
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <p><span class="ml-3 text-xl">AIRLINE SEARCH PORTAL</span></p>
            </a>
            <!-- <p class="mt-2 text-sm text-gray-500">The most relaible flight booking platform </p> -->
          </div>
          <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">SUBMISSION DETAILS : </h2>
              <nav class="list-none mb-10">
                <li>
                  <!-- <a class="text-gray-600 hover:text-gray-800">NAME</a> -->
                </li>
                <li>
                  <!-- <a class="text-gray-600 hover:text-gray-800">REG. NO.</a> -->
                </li>
                <li>
                  <!-- <a class="text-gray-600 hover:text-gray-800">CONTACT E-MAIL</a> -->
                </li>
                <!-- <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li> -->
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">NAME</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">DOLA HARSHEL</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">APARAJIT TIWARI</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">ARCHIT REDDY</a>
                </li>
                <!-- <li>
                  <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                </li> -->
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">REG. NO.</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">19BCE0642</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">19BCE0858</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">19BCE0699</a>
                </li>
                <li>
                  <!-- <a class="text-gray-600 hover:text-gray-800">Fourth Link</a> -->
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h1 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CONTACTS US AT</h1>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">dola.harshel2019@vitstudent.ac.in</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">aparajit.tiwari2019@vitstudent.ac.in</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">archit.reddy2019@vitstudent.ac.in</a>
                </li>
                <li>
                  <!-- <a class="text-gray-600 hover:text-gray-800">Fourth Link</a> -->
                </li>
              </nav>
            </div>
          </div>
        </div>
        <div class="bg-gray-100">
          <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-600 text-sm text-center sm:text-left">Guided by: Prof. Sunil Kumar PV 
              <!-- <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@knyttneve</a> -->
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </footer>

</body>
</html>
</body>
</html>
</body>
</html>
