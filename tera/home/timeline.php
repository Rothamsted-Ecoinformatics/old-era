<h1>Park Grass - Timeline example..it's just a demo</h1>

    <div id="Timeline"></div>
    <script>
        
        var options ={  
           width:'100%',
           height:'650px',
           timenav_position:'bottom',
           language:'en',
           start_at_end:false,
           start_at_slide:0,
           scale_factor:1
        }; 

         window.timeline = new TL.Timeline('Timeline','home/parkGrassTimeline.json',options);
    </script>
