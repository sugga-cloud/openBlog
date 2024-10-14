<!-- View for blog -->


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href=<?php $this->asset("style.css"); ?> >
</head>
<body>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
        <h1 style="font-size:2rem;font-weight:bolder"><?php echo htmlspecialchars($blog['title'], ENT_QUOTES, "UTF-8"); ?></h1>
      <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="<?php echo htmlspecialchars($blog['url'], ENT_QUOTES, "UTF-8"); ?>">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class=" sm:pl-8  sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4"><?php echo htmlspecialchars($blog['content'], ENT_QUOTES, "UTF-8"); ?></p>
         
        </div>
      </div>
    </div>
  </div>
</section>
<div class="dividers"></div>
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Comments</h1>
    
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form action="comment" method="get">
        <div class="p-2 w-full">
          <div class="relative">
            <input type="text" value="<?php echo htmlspecialchars($blog['blog_id'], ENT_QUOTES, "UTF-8"); ?>" name="id" hidden>
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Comment</button>
        </div>
        </div>
      </div></form>
    </div>
  </div>
</section>
<section class="text-gray-600 body-font overflow-hidden">
    <?php foreach($comment as $c): ?>
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="dividers" style="width:60%;margin:auto"></div>
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 rounded-3xl md:mb-0  flex-shrink-0  flex border shadow-lg text-center me-2 flex-col  ">
                    <span class="font-semibold title-font text-grey-700">Comment</span>
                    <span class="font-semibold title-font text-grey-700">Response</span>
        </div>
        <div class="md:flex-grow divider  rounded-3xl">
          
          <p class="leading-relaxed"><?php echo htmlspecialchars($c["comment"], ENT_QUOTES, "UTF-8"); ?></p>
          
        </div>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
</body>
</html>