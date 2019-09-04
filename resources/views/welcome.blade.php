<!DOCTYPE html>

<html>
    <head>
        <title>Simple Chatbot</title>

        <style type="text/css">
            body{background-color:green;}

            .pos
            {
                position:fixed;
                top:250px;
                left:50px;
                color:lightblue;
            }
        </style>

        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                introMessage: 'Hello',
                //placeholderText:'hello',
                chatServer : '/botman', 
                title: 'Finance Tips Chatbot', 
                mainColor: 'green',
                bubbleBackground: 'blue',
                aboutText: '',
                bubbleAvatarUrl: '',
                desktopHeight:700,
                desktopWidth:500,
            }; 
        </script>

        <script id="botManWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'>
        </script>
    </head>

    <body>
        <h1 class="pos">Chatbot widget at the lower right corner</h1>
    </body>

</html>