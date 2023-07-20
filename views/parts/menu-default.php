<?php

$args       = $args ?? null;
$currentUrl = $args['currentUrl'] ?? null;
$noneActive = $args['noneActive'] ?? null;
$menuItems  = $args['menuItems'] ?? null;
?>

<nav class="flex items-center justify-between relative">
   <div class="logo flex-1 pl-20 flex items-center z-10">
       <img src="<?php echo IMG_DIR.'/logo.png' ?> " class="w-14 h-14" alt="<?php echo get_bloginfo('name')?>">
       <div class="border-b border-gray-500 flex-1 ml-10"></div>
   </div>

    <div
            id="menu-default"
            class="menu flex-1 bg-gray-900 lg:bg-gradient-to-r from-gray-700 to-gray-900 uppercase lg:-ml-10
            absolute left-0 top-0 w-1/3 z-20 hidden lg:block lg:z-0 h-screen lg:h-auto
            lg:w-full lg:static">
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow text-center">
                <?php foreach ( array_values($menuItems) as $idx => $item ): ?>
                    <?php if ( $item->children ): ?>
                        <div class="relative group lg:inline-block">
                            <a href="#"
                               class="nav-parent-item <?php echo !$noneActive ? ($currentUrl === $item->url ? 'active' : '') : '' ?>">
                                <b class="mr-1"><?php echo sprintf("%02d", $idx+1) ?></b><?php echo $item->title ?>
                            </a>

                            <div
                                    class="nav-dropdown-item">
                                <?php foreach ( $item->children as $child ): ?>
                                    <a href="<?php echo $child->url ?>"
                                       class="px-4 py-2 block text-white"><?php echo $child->title ?></a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo $item->url ?>"
                           target="_blank"
                           class="nav-parent-item <?php echo !$noneActive ? ($currentUrl === $item->url ? 'active' : '') : '' ?>">
                            <b class="mr-1"><?php echo sprintf("%02d", $idx+1) ?></b><?php echo $item->title?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

  <div class="block lg:hidden p-10">
    <button
            id="toggleMenu"
        class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
      </svg>
    </button>
  </div>

</nav>
