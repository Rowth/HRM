 
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>DASHBOARD</title>
  </head>
<style>


.main-div{
    overflow: hidden;
    font-family: sans-serif;
  }
.bg-color{
    background-color: #002957;
    color: #fff;
}
.forlogo img{
    width: 17rem;
}
.main-menu-text a{
    color:  #E5E5E5;
}
.icon-div i{
    font-size: 1rem;
}
.groups img{
    border-radius: 2rem;
}
.heading-div a{
    font-size: 1rem;
   
}.search-div{
    background: #FAFAFA;

}
.formInput input{
    outline: none;
    background: #FAFAFA;

   
}
.formInput i{
    color: #B3B3B3;
}
.text-div1{
    background-color:  #FFEFE7;

    

}
.calender select{

    outline: none;
    background:none;
}
.text-div1,.text-div2,.text-map,.graph-div p{
    font-size: 12px;
}
.text-div2{
    background-color:  #E8F0FB;

}
.text-div1 h6{
    font-size: 12px;
    font-weight: 600;
}
.text-div2 h6{
    font-size: 12px;
    font-weight: 600;
}
.text-map h6{
    font-size: 12px;
    font-weight: 600;
}
.graph-div p{
    background-color: #FFEFE7;
}
.announce-div h6{
    font-size: 12px;
    font-weight: 600;
}
.announce-div,.outing span{
font-size: 12px;
}
.outnigBg{
    background-color:#FAFAFA;
    ;
}
.outnigBg span{
    font-size: 14px;
}
.outing h6{
    font-size: 12px;
    font-weight: 600;
}
.blueBg {
    background-color:#161E54;
    color: #fff;
    
   
 } 
 .forlast a{
        font-size: 12px;
    }

.activitiy {
    background-color: #1B204A;
}
.activitiy h6{
    font-size: 12px ;
    font-weight: 600;
}
.next-div span{
    font-size: 10px;
}
.next-div1 h6{
    font-size: 15px;
    font-weight: 600;

}
.next-div1 p{
    font-size: 12px;
    margin: 0;
}
.button-div h6{
    font-size: 13px;
    font-weight: 600;
}
.button-div button{
    background-color: #FF5151;
    color: #fff;
    font-size: 11px;
}
.calender span{
    font-size: 10px;
}
.text-div11 h6{
    font-size: 13px;
    font-weight: 600;
}
.vector-div {
    background-color: rgba(0, 164, 124, 0.25);
    border-radius: 2rem;
}
.vector-div2{
    background-color: rgba(212, 22, 22, 0.25);
    border-radius: 2rem;
}
.chart-div h4{
    font-size: 18px;
    font-weight: 600;
}
.chart-div span{
    width: 12px;
    height: 12px;
    border-radius: 8px;
    background-color: green;
}
.chart-div p{
font-size: 14px;
font-weight: 600;
}

@media screen and (max-width: 480px) {
   .Arti h6{
       font-size: 12px;
   }
   .groups img{
       width: 2rem;
   }
   .text-div1,.text-div2,.text-map,.graph-div p{
    font-size: 15px;
}
.text-div1 h6{
    font-size: 15px;
   
}

.text-div2 h6{
    font-size: 15px;
   
}
.text-map h6{
    font-size: 15px;
   
}
.graph-div p{
    background-color: #FFEFE7;
}
.announce-div h6{
    font-size: 15px;
   
}
.announce-div,.outing span{
font-size: 15px;
}

.outnigBg span{
    font-size: 15px;
}
.outing h6{
    font-size: 15px;
    font-weight: 600;
}

 .forlast a{
        font-size: 15px;
    }
    .activitiy h6{
        font-size: 12px ;
        font-weight: 600;
    }
    .next-div span{
        font-size: 10px;
    }
    .next-div1 h6{
        font-size: 15px;
        
    }
    .next-div1 p{
        font-size: 14px;
     
    }
    .button-div h6{
        font-size: 13px;
       
    }
    .button-div button{
      
        font-size: 11px;
    }
    .calender span{
        font-size: 15px;
    }
    .text-div11 h6{
        font-size: 15px;
    
    }

  }

 </style>
  <body>
    <div class="main-div">
      <div class="row mx-auto">
        <div class="col-2 d-none d-lg-block bg-color ps-4">
          <div class="row my-2 forlogo">
            <img src="/image/logo.png" />
          </div>
          <div class="main-menu-text my-3 ps-3">
            <a href="/admin/dashboard" class="text-decoration-none">MAIN MENU</a>
          </div>
          <div class="row p-3  align-items-center">
            <div class="col-lg-2 icon-div">
             <a href="" class="text-decoration-none text-white">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
             </a>
            </div>
            <div class="col-lg-9 ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">Dashboard</a>
            </div>
          </div>
          <div class="row p-3 align-items-center">
            <div class="col-lg-2 icon-div">
              <a href="" class="text-decoration-none text-white"> <i class="fa-solid fa-bug"></i></a>
            </div>
            <div class="col-lg-9  ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">Recruitment</a>
            </div>
          </div>
          <div class="row p-3  align-items-center">
            <div class="col-lg-2 icon-div">
              <a href="" class="text-decoration-none text-white"><i class="fa-solid fa-clipboard-list"></i></a>
            </div>
            <div class="col-lg-9 ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">Schedule</a>
            </div>
          </div>
          <div class="row p-3  align-items-center">
            <div class="col-lg-2 icon-div">
              <a href="" class="text-decoration-none text-white"><i class="fa fa-calendar" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-9  ps-3 heading-div">
              <a href="" class="text-decoration-none text-white"> Employee</a>
            </div>
          </div>

          <div class="row p-3  align-items-center">
            <div class="col-lg-2 icon-div">
             <a href="" class="text-decoration-none text-white">
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
             </a>
            </div>
            <div class="col-lg-9  ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">
                Departments</a
              >
            </div>
          </div>
          <div class="main-menu-text my-3 ps-3">
            <a href="" class="text-decoration-none">OTHER</a>
          </div>
          <div class="row p-3 align-items-center">
            <div class="col-lg-2 icon-div">
              <a href="" class="text-decoration-none text-white">
                <i class="fa-solid fa-headphones"></i>
              </a>
            </div>
            <div class="col-lg-9 ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">Support</a>
            </div>
          </div>
          <div class="row p-3 align-items-center">
            <div class="col-lg-2 icon-div">
             <a href="" class="text-decoration-none text-white">
                <i class="fa fa-cog" aria-hidden="true"></i>
             </a>
            </div>
            <div class="col-lg-9 ps-3 heading-div">
              <a href="" class="text-decoration-none text-white">Setting</a>
            </div>
          </div>
        </div>




        
        <div class="col-12 col-md-10 pb-4">
          <div class="row">
            <div class="top-div shadow-sm">
              <div class="row mx-auto d-flex align-items-center firstRow py-3">
                <div class="col-5 ms-md-4 border search-div">
                  <div class="row d-flex align-items-center">
                    <div
                      class="col-12 formInput d-flex align-items-center justify-content: space-between"
                    >
                      <input
                        type="text"
                        class="flex-1 border-0 w-100"
                        placeholder="Search"
                      />
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                  </div>
                </div>
                <div
                  class="col-md-6 col-6 d-flex justify-content-md-end justify-content-between  align-items-center"
                >
                  <div
                    class="row d-flex justify-content-center align-items-center"
                  >
                    <div class="col-2 bell-icon">
                     <a href="">
                        <img src="./image/bell.png" alt="" />
                     </a>
                    </div>
                    <div class="col-2">
                      <a href=""><img src="./image/Vector (3).png" alt="" /></a>
                    </div>

                    <div class="col-8">
                      <div
                        class="row d-flex ms-md-0 ms-2 justify-content-center align-items-center"
                      >
                        <div class="col-4 groups m-0 p-0">
                          <img style="width: 40px;" class="" src="https://www.clipartmax.com/png/small/296-2969961_no-image-user-profile-icon.png" />
                        </div>
                        <div class="col-8 d-flex Arti">
                          <h6 class="m-0">Arti Jain</h6>
                          <a  href="" class="text-decoration-none text-muted"
                            ><i class="fa-solid fa-angle-down ms-2"></i
                          ></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mx-auto py-2">
            <h4>Dashboard</h4>
          </div>
          <div class="row mx-auto">
            <div class="col-lg-5">
              <div class="row mx-auto">
                <div class="text-div1 p-2 col rounded">
                  <h6>Available Position</h6>
                  <h4>24</h4>
                  <p class="text-danger m-0">4 Urgently needed</p>
                </div>
                <div class="text-div2 p-2 mx-2 col rounded">
                  <h6>Job Open</h6>
                  <h4>24</h4>
                  <p class="text-primary m-0">4 Active Hiring</p>
                </div>
                <div class="text-div1 p-2 col rounded">
                  <h6>New Employees</h6>
                  <h4>24</h4>
                  <p class="text-danger m-0">4 Department</p>
                </div>
              </div>
              <div class="row my-3 mx-auto">
                <div class="rounded border d-flex align-items-center  my-2 my-lg-0 col">
                  <div class="text-map">
                    <h6>Total Employees</h6>
                    <h4>216</h4>
                    <p class="m-0">120 Men</p>
                    <p class="m-0">96 Women</p>
                  </div>
                  <div class="graph-div py-3">
                    <img src="./image/Group 4 (1).png" alt="" />

                    <p class="m-0 p-1 rounded">+2% Past month</p>
                  </div>
                </div>
                <div class="rounded border ms-lg-2 d-flex align-items-center col">
                  <div class="text-map">
                    <h6>Talent Request</h6>
                    <h4>16</h4>
                    <p class="m-0">6 Men</p>
                    <p class="m-0">10 Women</p>
                  </div>
                  <div class="graph-div py-3">
                    <img src="./image/Group 4 (1).png" alt="" />

                    <p class="m-0 p-1 rounded">+5% Past month</p>
                  </div>
                </div>
              </div>
              <div class="row mx-auto my-2">
                <div class="col border rounded p-3">
                  <div
                    class="announce-div d-flex justify-content-between align-items-center"
                  >
                    <h6>Announcement</h6>

                    <div class="calender p-2 border rounded">
                      <!-- <span
                        >Today, 13 Sep 2021
                        <a href="" class="text-decoration-none text-muted"
                          ><i class="fa-solid fa-angle-down ms-2"></i
                        ></a>
                      </span> -->
                      <select class="border-0" aria-label="Default select example">
                        <option selected>Today, 13 Sep 2021</option>
                        <option value="1">Today, 14 Sep 2021</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <div
                    class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
                  >
                    <div class="outing">
                      <h6>Outing schedule for every departement</h6>
                      <span>5 Minutes ago</span>
                    </div>
                    <div class="pin-icon">
                <a href="" class="text-decoration-none text-muted">      <img src="./image/pin.png" alt="" />
                      <i class="fa-solid fa-ellipsis ms-2"></i></a>
                    </div>
                  </div>

                  <div
                    class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
                  >
                    <div class="outing">
                      <h6>Meeting HR Department</h6>
                      <span>Yesterday, 12:30 PM</span>
                    </div>
                    <div class="pin-icon">
                        <a href="" class="text-decoration-none text-muted">     <img src="./image/pin.png" alt="" />
                              <i class="fa-solid fa-ellipsis ms-2"></i></a>
                            </div>
                  </div>
                  <div
                    class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
                  >
                    <div class="outing">
                      <h6>
                        IT Department need two more talents for UX/UI Designer
                        
                      </h6>
                      <span>Yesterday, 09:15 AM</span>
                    </div>
                    <div class="pin-icon">
                        <a href="" class="text-decoration-none text-muted">      <img src="./image/pin.png" alt="" />
                              <i class="fa-solid fa-ellipsis ms-2"></i></a>
                            </div>
                  </div>
                  <div class="py-2 forlast text-center border rounded">
                    
                    <a href="" class="text-danger text-decoration-none">See All Announcement</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 ">
                        <div class="row mx-auto" >
                         <div class="col ">

                          <div class="row">
                       <div class="col blueBg  rounded">

                  <div class=" row activitiy rounded p-3">
                 <div class="col">
                    <h6>Recently Activity</h6>
                 </div>
                  </div>
                  <div class="next-div px-2 row">

                    <div class="col next-div1 mt-3">
                        <span>10.40 AM, Fri 10 Sept 2021</span>
                        <h6 class="mt-2">You Posted a New Job</h6>
                           <p>Kindly check the requirements and terms of work and make sure everything is right.</p>
                           
                    </div>
            
                  </div>
              <div class="button-div px-2 mt-4 my-2 row 
             ">
           <div class="col  d-flex justify-content-between align-items-center">
            <h6>Today you makes 12 Activity</h6>
            <button class="btn  rounded p-1  ">See All Activity</button>
           </div>
           </div>


           </div>
  </div>

               <div class="row  my-2">
                <div class="col border rounded p-3">
                 <div class="announce-div row ">
                 
             <div class="col  d-flex justify-content-between align-items-center">

            
              <h6>Upcoming Schedule</h6>

              <div class="calender p-2 border rounded">
                <!-- <span
                  >Today, 13 Sep 2021
                  <a href="" class="text-decoration-none text-muted"
                    ><i class="fa-solid fa-angle-down ms-2"></i
                  ></a>
                </span> -->
                <select class="border-0" aria-label="Default select example">
                    <option selected>Today, 13 Sep 2021</option>
                    <option value="1">Today, 14 Sep 2021</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
            </div>
            </div>


            <span>Priority</span>
            <div
              class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
            >
              <div class="outing">
                <h6>Review candidate applications</h6>
                <span>Today - 11.30 AM</span>
              </div>
              <div class="pin-icon">
               
                <a href="" class="text-decoration-none text-muted">    
                    <i class="fa-solid fa-ellipsis ms-2"></i></a>
              </div>
            </div>
            <span>Other</span>

            <div
              class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
            >
              <div class="outing">
                <h6>Interview with candidates</h6>
                <span>Yesterday, 12:30 PM</span>
              </div>
              <div class="pin-icon">
               
                <a href="" class="text-decoration-none text-muted">    
                    <i class="fa-solid fa-ellipsis ms-2"></i></a>
              </div>
            </div>
            <div
              class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
            >
              <div class="outing">
                <h6>
                    Short meeting with product designer from IT Departement
                </h6>
                <span>Yesterday, 09:15 AM</span>
              </div>
              <div class="pin-icon">
              
                <a href="" class="text-decoration-none text-muted">    
                    <i class="fa-solid fa-ellipsis ms-2"></i></a>
              </div>
            </div>
            <div
            class="p-2 border outnigBg rounded my-2 d-flex justify-content-between align-items-center"
          >
            <div class="outing">
              <h6>
                Sort Front-end developer candidates
              </h6>
              <span>Yesterday, 09:15 AM</span>
            </div>
            <div class="pin-icon">
            
                <a href="" class="text-decoration-none text-muted">    
                    <i class="fa-solid fa-ellipsis ms-2"></i></a>
            </div>
          </div>

          <div class="py-2 forlast text-center border rounded">
            <a href="" class="text-danger text-decoration-none">Creat a New Schedule</a>
          </div>
            
          </div>
                                   </div>

                            </div>
                          <div class="col mx-lg-2"> 
                            <div class="date">
                              <p class="text-end m-0">April 2022 - Week 3</p>


                                 </div>


                                 <div class="calender-div">
                                     
                                 </div>
                                 <div class="bussines-trip my-2 d-flex align-items-center border rounded justify-content-between p-3">
                                    <div class="text-div11">
                                        <h6 class="text-success">BUSSINESS TRIP</h6>
                                        <h6>Moch. Rasheed</h6>
                                    </div>
                                    <div class="p-2 vector-div">
                                        <img src="/image/Vector (5).png" alt="">
                                    </div>

                                 </div>
                                 <div class="bussines-trip my-2 d-flex align-items-center border rounded justify-content-between p-3">
                                    <div class="text-div11">
                                        <h6 class="text-danger">PAID LEAVE</h6>
                                        <h6>Soniya</h6>
                                    </div>
                                    <div class="p-2 vector-div2">
                                        <img src="./image/Vector (6).png" alt="">
                                    </div>

                                 </div>
                                <div class="row  forChart mx-auto">

                                    <div class="chart-div border rounded p-3">
                                       <h4 class="text-end">Time Off Statistics</h4>
                                     <ul class="d-flex justify-content-between">
                                         <li class="p-0 ">
                                             <p class="">Sick Leave</p>
                                         </li>

                                          
                                        <li class="p-0 " ><p class="">Paid Leave</p>
                                        </li>   
                                     </ul>


                                     <div class="row mt-5 pt-5">
                                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
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
    
    </div>



    <script>
        var xValues = ["Apr 15", "Apr 16", "Apr 17", "Apr 18", "Apr 19"];
        var yValues = [0, 5, 10, 15, 20];
        var barColors = ["red", "green","blue","orange","brown"];
        
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Time Off Statistics"
            }
          }
        });
        </script>
 
