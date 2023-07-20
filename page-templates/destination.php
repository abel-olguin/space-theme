<?php
/**
 * Template Name: Destination template
 * @package space
 */

get_header();

$json         = json_decode(file_get_contents(JSON_DIR . '/destination.json'), true);
$destinations = $json ? $json['destinations'] : [];
$selected     = $destinations[0];
?>

    <div class="pt-20">
    <div class="container mx-auto text-white ">
        <div class="mx-5">
            <h1 class="text-3xl font-bold uppercase"><span class="text-gray-600">01</span> pick your destination</h1>

            <div class="grid gap-y-10 lg:gap-x-5 lg:grid-cols-2 items-center pt-20">
                <div >
                    <img src="<?php echo IMG_DIR.'/'.$selected['images']['png']?>"
                         class="mx-auto " id="destination-image">
                </div>
                <div>
                    <div id="tabs" class="text-center lg:text-right pb-20">
                        <ul class="flex text-center space-x-10 uppercase justify-center lg:justify-normal">
                            <?php foreach ($destinations as $idx => $destination): ?>
                                <li data-image="<?php echo IMG_DIR.'/'.$destination['images']['png'] ?>"><a href="#tabs-<?php echo $idx ?>"><?php echo $destination['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php foreach ($destinations as $idx => $destination): ?>
                            <div id="tabs-<?php echo $idx ?>">

                                <h2 class="text-9xl uppercase"><?php echo $destination['name'] ?></h2>
                                <p class="pt-10"><?php echo $destination['description'] ?></p>

                                <div class="mt-10 lg:mt-20 border-b border-gray-500"></div>

                                <div class="grid lg:grid-cols-2 text-center gap-y-10 lg:gap-x-10 pt-10 uppercase">
                                    <div class="flex flex-col">
                                        <span>Avg. Distance</span>
                                        <h3 class="text-xl font-semibold pt-2"><?php echo $destination['distance'] ?></h3>
                                    </div>
                                    <div class="flex flex-col">
                                        <span>Est. travel time</span>
                                        <h3 class="text-xl font-semibold pt-2"><?php echo $destination['travel'] ?></h3>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </div>

    </div>

<?php

get_footer();
