
<nav class="navbar mdb-color darken-2">
    <div class="container">
        <!-- Brand -->
        <div class="navbar-brand waves-effect px-3 b-round-s">
            <a href="/" class="text-light strong">Modera</a>
        </div>
        <form  action="/set">
            <button class="btn waves-effect px-4 py-2 b-round-s mdb-color darken-1 text-light" type="submit">Set values</button>
        </form>
        <form action="/clear">
            <button class="btn waves-effect px-4 py-2 b-round-s mdb-color darken-1 text-light" type="submit">Clear DB</button>
        </form>

        <form method="post" action="/load" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input class=" b-round-s mdb-color darken-1 text-light" type="file" name="data">
            <button class="btn waves-effect px-4 py-2 b-round-s mdb-color darken-1 text-light type="submit">Load file</button>
        </form>


        <!--form class="md-form" action="/">
            <div class="btn waves-effect px-4 py-2 b-round-s mdb-color darken-1 text-light">
                    <span>Choose file</span>
                    <input type="file">
            </div>
            <button class="btn waves-effect px-4 py-2 b-round-s mdb-color darken-1 text-light" type="submit">Load file</button>

            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file">
            </div>
        </form-->

      
    </div>
</nav>
