<div class="banner"  style="background-image: url({{\App\Services\Helper::getRandomBanner()}}) !important;" >

    <div class="container">
        <div class="banner-content">

            <form action="{{url('search/clubs')}}" method="GET">

                <div id="search-bar" class="input-group mt-4" style="height: 50px;">

                    <div class="input-group-prepend" >
                        <div style="width: 50px; background-color: rgb(239, 58, 177); border: 0px;" class="input-group-text"><button type="submit"><span class="fa fa-search"></span></button></div>
                    </div>
                    <input style="background-color: rgba(255,255,255,0.8) !important;" id="search-club" type="text" name="search" class="form-control" placeholder="Wyszukaj swój klub">

                </div>

            </form>
        </div>

    </div>



</div>