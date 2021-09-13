@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Welcome to the blog site..!
                </h1>
                <a href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                        Read More
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2017/10/10/21/46/laptop-2838914_960_720.jpg"
            width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Enjoy every blog posts....
            </h2>
            <p class="py-8 text-gray-500 text-s">
                A paragraph is a series of related sentences developing a central idea,
                 called the topic. Try to think about paragraphs in terms of thematic unity:
                  a paragraph is a sentence or a group of sentences that supports one central, unified idea.
                   Paragraphs add one idea at a time to your broader argument.
            </p>

            <a href="/blog"
            class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find More
            </a>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
           Upcomming Blogs in this site
        </h2>
        <span class="font-extrabold block text-4xl py-1">
            Number 1 blog
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            A paragraph is a series of related sentences developing a central idea, called the topic.
        </p>
    </div>


    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-green-500 text-white-300 pt-10">
            <div class="m-auto pt-4 pb-16 sm-m-auto w-4/5 block">
                <span class="uppercase text-xl">
                    LARAVEL
                </span>

                <h3 class="text-xl font-bold py-10">
                    A paragraph is a series of related sentences developing a central idea,
                    called the topic. Try to think about paragraphs in terms of thematic unity:
                     a paragraph is a sentence or a group of sentences that supports one central, unified idea.
                </h3>

                <a href="/blog"
                class="uppercase bg-transparent border-2 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find More
                </a>
            </div>
        </div>

        <div>
            <img src="https://cdn.pixabay.com/photo/2015/03/26/10/25/apple-691323_960_720.jpg"
            width="700" alt="">
        </div>

    </div>
    
@endsection