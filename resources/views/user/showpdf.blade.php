<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .gfg {

        position: relative;
    }

    .first-txt {
        position: absolute;
        top: 17px;
        left: 20px;
    }

    .second-txt {
        position: absolute;
        top: 17px;
        left: 150px;
    }

    .fontsize {
        font-size: 30px
    }

    .figure {
        min-width: 90%;
        max-width: 100%;
        margin: 2rem;
        padding: 1.5rem 2rem 2rem;
        
    }

    /* TABLE */
    .barChart_h {
        table-layout: fixed;
        /* enforce cell widths*/
        /* display: block; nope we want a table this time */
        /*height: auto; don;t need this*/
        /* Do I need this? */
        width: 100%;
        /* yes now needed for full width table (display:table)*/
        overflow-wrap: break-word;
        border-spacing: 0;
    }

    /* CAPTION */
    .barChart_h caption {
        /*display: block;Nope we want a table caption */
        padding: 0 0 1rem 0;
        line-height: 1.1;
        font-size: 1.1rem;
        font-weight: bold;
        text-align: left;
    }

    /* TBODY */
    .barChart_h tbody {
        /* display: block; nope we want table behaviour still*/
    }

    /* We don't need this in this example as we are not linearising the table*/
    /*
.barChart_h tbody:after {
  /* For IE9 and under, need to enclose floats... */
    /*
  content: "";
  display: block;
  clear: both;
  height: 0;
}
*/

    /* TH+TD */
    .barChart_h tbody tr.firstRow th,
    .barChart_h tbody tr.firstRow td {
        padding: 1rem 0 0.5rem 0;
        /* Add extra vertical padding. */
    }

    .barChart_h tbody th,
    .barChart_h tbody td {
        padding: 0.5rem 0 0.4rem 0;
        /* Space around Bars. */
    }

    .barChart_h tbody tr.lastRow th,
    .barChart_h tbody tr.lastRow td {
        padding: 0.5rem 0 1rem 0;
        /* Add extra vertical padding. */
    }

    /* TH */
    .barChart_h tbody th {
        font-weight: normal;
        text-align: right;
    }

    /* TD */
    .barChart_h tbody td {
        border-left: 2px solid #5a5a5a2b;
        /* X-AXIS. (vertical) */
        border-right: 1px solid #ddd;
        /* Finish out repeating vertical-gridlines. */
        background-image: linear-gradient(to right, #ddd 1px, transparent 1px);
        /* Create grey-transparent gradient for 1px, then remainder of gradient is transparent.
                                               This creates the illusion of a 1px vertical-line. */
        background-size: 10% 100%;
        /* Go right in 10% increments. */
    }

    /* BARS */
    .barChart_h tbody td span {
        position: relative;
        /* Needed for absolute-positioning of Bar-value. */
        display: block;
        /* Expands <span> to fill <td> */
        height: 20px;
        background: #865216;
        /* Aqua (default) */
        /* border-top: 1px solid #5a5a5a69; */
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        box-shadow: 5px 0px 5px rgba(0, 0, 0, 0.3);
    }

    /* BAR-VALUES */
    .barChart_h tbody td span b {
        position: absolute;
        left: 100%;
        top: 0;
        right: auto;
        bottom: 0;
        display: block;
        padding: 0 0 0 0.5rem;
        font-weight: normal;
    }

    /* Y-AXIS */
    .barChart_h tbody th.blankCell {
        width: 22%;
        /* Adjust to suit butwe need a width or both cells will be 50% by default*/
    }

    .barChart_h tbody th.y-axis {
        position: relative;
        /* New */
        padding-bottom: 1.4rem;
        /* border-bottom: 2px solid #5a5a5a2b; */
        /* Y-AXIS. (horizontal) */
        background-color: #fff;
    }

    /* Y-AXIS TITLE */
    .barChart_h tbody div.y-axis-title {
        display: block;
        text-align: center;
        font-weight: bold;
    }

    /* Y-AXIS LABELS */
    .barChart_h tbody ol.y-axis-labels {
        position: absolute;
        top: auto;
        bottom: 0;
        right: 0;
        left: 0;
        display: flex;
        /* Create Flexbox (Flex-Container). */
        flex-direction: row;
        margin: 0;
        /* New */
        padding: 0;
        /* New */
        list-style: none;
        /* New */
        font-size: 0.9rem;
    }

    .barChart_h tbody ol.y-axis-labels li.zero {
        position: absolute;
        /* Remove 0 from Flexbox flow. */
        /* New */
        left: 0;
        right: auto;
        bottom: auto;
        top: 0;
    }

    .barChart_h tbody ol.y-axis-labels li.zero b {
        transform: translate(-50%, 0%);
    }

    .barChart_h tbody ol.y-axis-labels li {
        flex: 1 0 0;
        text-align: right;
    }

    .barChart_h tbody ol.y-axis-labels li b {
        display: inline-flex;
        transform: translate(50%, 0%);
        font-weight: normal;
    }
    @media screen and (max-width: 414px) {
  
  /* CAPTION */
  .barChart_h caption {
    font-size: 1rem;
  }

  /* FIGURE */
  .figure {
    margin: 0;
    padding: 1rem;
  }

  /* TD */
  .barChart_h tbody td {
    width: 70%;
  }
}
</style>

<body>
   
        <div class=" col-md-12 gfg">
            <img src="{{ asset('uploads/image/' . $value->titlepageimage) }}" width="100%" height="35%">
            <div class=" first-txt" style="background-color: #3b4951;color:white;width:95.2%">
                <h3 style=" margin-left:30px">{{ $value->title }}</h3>
				<p style=" margin-left:30px">{{$date}}</p>
            </div>
        </div><br>
        <div class="col-md-12">
            <div style="background-color: #3b4951;color:white;width:100%">
                <h3 style=" margin-left:30px">Summary</h3>
            </div>
            <center>
                <p>Site received 0.00” of rain this week</p>
            </center>
            <center>
                <p>Total Rain Out Days:{{ $value->totelrain }} &nbsp; &nbsp; &nbsp;Total Mud Days (no
                    work):{{ $value->totelmud }}</p>
            </center>
            <p class="fontsized">{!! $value->summarycontent !!}</p>
        </div>
        <div class="col-md-12">
            <img src="{{ asset('uploads/image/' . $value->progressphoto) }}" width="100%" height="100%">
            <div class=" first-txt" style="background-color: #3b4951;color:white;width:95.2%">
                <h3 style=" margin-left:30px">Progress Photos </h3>
            </div>
        </div>
        <div class="col-md-12">
            <img src="{{ asset('uploads/image/' . $value->progressphototwo) }}" width="100%" height="40%">
            <div class=" first-txt" style="background-color: #3b4951;color:white;width:95.2%">
                <h3 style=" margin-left:30px">Progress Photos </h3>
            </div>
        </div><br>
        <div class="col-md-12">
            <img src="{{ asset('uploads/image/' . $value->progressphotothree) }}" width="100%" height="70%">
            <div class=" first-txt" style="background-color: #3b4951;color:white;width:95.2%">
                <h3 style=" margin-left:30px">Progress Photos </h3>
            </div>
        </div><br>
        <div class="col-md-12">
            <div style="background-color: #3b4951;color:white;width:100%">
                <h3 style=" margin-left:30px">Two Week Look Ahead </h3>
            </div>
            <p>{!! $value->twoweekcontent !!}</p>
        </div>
        <div class="col-md-12">
            <div style="background-color: #3b4951;color:white;width:100%">
                <h3 style=" margin-left:30px">Safety Topic</h3>
            </div>
            <p style="margin-left:30px; font-size: 26px; line-height: 28px;" >{!! $value->safetytopic !!}</p>
            <div>
                <center><img src="{{ asset('uploads/image/' . $value->safetyimage) }}" width="40%" height="30%">
                </center>
            </div>
        </div><br>
        <div class="col-md-12">
            <div style="background-color: #3b4951;color:white;width:100%">
                <h3 style=" margin-left:30px">Schedule</h3>
            </div>
        </div>
        <figure class="figure">
            <table class="barChart_h">
                <tbody>
                    <!-- Y-axis -->
                    <tr>
                        <th class="blankCell"></th>
                        <th class="y-axis">
                            <div class="y-axis-title"># of Responses</div>
                            <ol class="y-axis-labels">
                                {{-- <li class="zero"><b>0</b></li>
                                <li><b>10%</b></li>
                                <li><b>20%</b></li>
                                <li><b>30%</b></li>
                                <li><b>40%</b></li>
                                <li><b>50%</b></li>
                                <li><b>60%</b></li>
                                <li><b>70%</b></li>
                                <li><b>80%</b></li>
                                <li><b>90%</b></li>
                                <li><b>100%</b></li> --}}
                            </ol>
                        </th>
                    </tr>

                    <!-- Data Rows -->
                    <tr class="firstRow">
                        <th scope="row">PEMB Roofing:</th>
                        <td><span style="width:{{ $value->pembroofing }}%"><b>{{ $value->pembroofing }}</b></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Frame Exterior Walls:</th>
                        <td><span
                                style="width:{{ $value->frameexteriorwalls }}%"><b>{{ $value->frameexteriorwalls }}</b></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sheath Walls & Vapor Barrier:</th>
                        <td><span style="width:{{ $value->sheathwalls }}%"><b>{{ $value->sheathwalls }}</b></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Siding Install</th>
                        <td><span style="width:{{ $value->sidinginstall }}%"><b>{{ $value->sidinginstall }}</b></span>
                        </td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Windows & Store Fronts:</th>
                        <td><span style="width:{{ $value->windows }}%"><b>{{ $value->windows }}</b></span></td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Exterior Door Instal:</th>
                        <td><span
                                style="width:{{ $value->exteriordoorinstal }}%"><b>{{ $value->exteriordoorinstal }}</b></span>
                        </td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Lighting fixtures & Poles:</th>
                        <td><span
                                style="width:{{ $value->lightingfixtures }}%"><b>{{ $value->lightingfixtures }}</b></span>
                        </td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Paving:</th>
                        <td><span style="width:{{ $value->paving }}%"><b>{{ $value->paving }}</b></span></td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Back Fill behind Curbs:</th>
                        <td><span
                                style="width:{{ $value->backfillbehindcurbs }}%"><b>{{ $value->backfillbehindcurbs }}</b></span>
                        </td>
                    </tr>
                    <tr class="lastRow">
                        <th scope="row">Pavers:</th>
                        <td><span style="width:{{ $value->Pavers }}%"><b>{{ $value->Pavers }}</b></span></td>
                    </tr>

                    </tr>
                </tbody>
            </table>
        </figure>
        <div class="col-md-12">
          <div style="background-color: #3b4951;color:white;width:100%">
              <h3 style=" margin-left:30px">Tasks/Issues/Resolutions</h3>
          </div>
          <div >
           <center> <p >{!! $value->tasks_issue !!}</p></center>
          </div>
          
      </div>

 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
