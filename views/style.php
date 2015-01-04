<style>
 #frame3{
 	background-color:#e2dada;
 	width:100%;
 }

 #dosearch{
    background-color:#ff22ff;
    width:100%;
    margin-left: 10%;
 }

    .heading
    {
        margin-top: 50px;
        margin-bottom: 50px;
        border-radius: 6px;
        padding-right: 60px;
        padding-left: 60px;
        background-color: #eee;
        padding-top: 48px;
        padding-bottom: 48px;
    }

    .summary-heading
    {
        margin-top: 5%;
    }

    .summary
    {
        
        
    }

    .pull-left
    {
        margin-right: 5%;
        margin-left: 5%;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .summary-heading
    {
        font-size: 50px;
    }
    .rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>
