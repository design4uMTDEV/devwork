
<div class="m-auto mt-5 pb-5 pt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
        <x-jet-label for="search" value="{{ __('Search for a book via Google Books API') }}" />
        <x-jet-input id="search" placeholder="Type keywords like: programming, php, laravel ..." class="block mt-1 w-full" type="text" name="search" :value="old('search')" required autofocus />
    </div>

    <x-jet-button id="button" class="ml-4 my-5 status_label status-success">
        Search                       
    </x-jet-button>
    <button id="button"></button>
    <div id="results"></div>

    <script>
function booksearch() {
    var search = document.getElementById('search').value;
    document.getElementById('results').innerHTML = "";
    console.log(search);

    $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
        datatype: "json",

        success: function(data) {
            for(i = 0; i < data.items.length; i++) {
                const link =  data.items[i].volumeInfo.previewLink;
                var image = "";
                
                if(data.items[i].volumeInfo.hasOwnProperty('imageLinks')) {

                    image =  data.items[i].volumeInfo.imageLinks.thumbnail;
                }

                if(image != ""){
                                        
                    results.innerHTML += "<div class='bg-white overflow-hidden shadow-xl flex sm:rounded-lg p-10 mb-10'>"
                                        +"<img src='" + image + "'>"
                                        +"<div class='book-content'>"
                                        +"<h2>"  + data.items[i].volumeInfo.title + "</h2>"  
                                        + "<small><b>"  + data.items[i].volumeInfo.publishedDate + "</b></small><br>" 
                                        + "<small><b>E-book:</b> "  + data.items[i].saleInfo.isEbook + "</small><br>" 
                                        + "<a href='" + link + "'><small><b>Available at: </b>" + link + "</small></a>" 
                                        + "<a href='" + link + "'><div class='book-more'>See more</div></a>" 
                                        +"</div></div>";
                } else {
                    results.innerHTML += "<div class='bg-white overflow-hidden shadow-xl flex sm:rounded-lg p-10 mb-10'>"
                                +"<div class='book-content'>"
                                        +"<h2>"  + data.items[i].volumeInfo.title + "</h2>"  
                                        + "<small><b>"  + data.items[i].volumeInfo.publishedDate + "</b></small><br>" 
                                        + "<small><b>E-book:</b> "  + data.items[i].saleInfo.isEbook + "</small><br>" 
                                        + "<a href='" + link + "'><small><b>Available at: </b>" + link + "</small></a>" 
                                        + "<a href='" + link + "'><div class='book-more'>See more</div></a>" 
                                        +"</div></div>";
                }
            }
        },
        type:'GET'
    });

};

window.onload = function booksearch1() {
    var search = document.getElementById('search').value;
    document.getElementById('results').innerHTML = "";
    console.log(search);
    results.innerHTML += "<h2 class='py-5'>Programming related books</h2>"
    $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q=programming",
        datatype: "json",

        success: function(data) {
            for(i = 0; i < data.items.length; i++) {
                const link =  data.items[i].volumeInfo.previewLink;
                var image = "";
               
                if(data.items[i].volumeInfo.hasOwnProperty('imageLinks')) {

                    image =  data.items[i].volumeInfo.imageLinks.thumbnail;
                }

                

                if(image != ""){
                                        
                    results.innerHTML += "<div class='bg-white overflow-hidden shadow-xl flex sm:rounded-lg p-10 mb-10'>"
                                        +"<img src='" + image + "'>"
                                        +"<div class='book-content'>"
                                        +"<h2>"  + data.items[i].volumeInfo.title + "</h2>"  
                                        + "<small><b>"  + data.items[i].volumeInfo.publishedDate + "</b></small><br>" 
                                        + "<small><b>E-book:</b> "  + data.items[i].saleInfo.isEbook + "</small><br>" 
                                        + "<a href='" + link + "'><small><b>Available at: </b>" + link + "</small></a>" 
                                        + "<a href='" + link + "'><div class='book-more'>See more</div></a>" 
                                        +"</div></div>";
                } else {
                    results.innerHTML += "<div class='bg-white overflow-hidden shadow-xl flex sm:rounded-lg p-10 mb-10'>"
                               +"<div class='book-content'>"
                                        +"<h2>"  + data.items[i].volumeInfo.title + "</h2>"  
                                        + "<small><b>"  + data.items[i].volumeInfo.publishedDate + "</b></small><br>" 
                                        + "<small><b>E-book:</b> "  + data.items[i].saleInfo.isEbook + "</small><br>" 
                                        + "<a href='" + link + "'><small><b>Available at: </b>" + link + "</small></a>" 
                                        + "<a href='" + link + "'><div class='book-more'>See more</div></a>" 
                                        +"</div></div>";
                }
            }
        },
        type:'GET'
    });

};

document.getElementById('button').addEventListener('click', booksearch, false);


    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</div>
