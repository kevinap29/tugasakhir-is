<div class="row justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
                if ($page == 1) {
                    echo '<li class="page-item disabled">';
                }else {
                    echo '<li class="page-item">';
                }

                switch ($_GET['pag']) {
                    case '2':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=1" aria-label="Previous">';
                        break;
                    case '3':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=2" aria-label="Previous">';
                        break;
                    case '4':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=3" aria-label="Previous">';
                        break;

                    default:
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=1" aria-label="Previous">';
                        break;
                }//end switch pagination previous

                    if ($page == 1) {
                        echo '<i class="fa fa-arrow-circle-left text-muted" aria-hidden="true"></i>';
                    }else {
                        echo '<i class="fa fa-arrow-circle-left text-primary" aria-hidden="true"></i>';
                    }
                ?>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            
            <?php
            $pag = $_GET['pag'];
            $total_pag = 4;
            $paginate = 0;
            switch ($pag) {
                case 1:
                    echo '<li class="page-item active">
                    <a class="page-link" href="index.php?page=listBrand&pag=1">
                    1</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=2">
                    2</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=3">
                    3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=4">
                    4</a></li>';
                    break;
                case 2:
                    echo '<li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=1">
                    1</a></li>
                    <li class="page-item active">
                    <a class="page-link" href="index.php?page=listBrand&pag=2">
                    2</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=3">
                    3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=4">
                    4</a></li>';
                    break;
                case 3:
                    echo '<li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=1">
                    1</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=2">
                    2</a></li>
                    <li class="page-item active">
                    <a class="page-link" href="index.php?page=listBrand&pag=3">
                    3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=4">
                    4</a></li>';
                    break;
                case 4:
                    echo '<li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=1">
                    1</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=2">
                    2</a></li>
                    <li class="page-item">
                    <a class="page-link" href="index.php?page=listBrand&pag=3">
                    3</a></li>
                    <li class="page-item active">
                    <a class="page-link" href="index.php?page=listBrand&pag=4">
                    4</a></li>';
                    break;
            }
            ?>

            <?php
                if ($page == 4) {
                    echo '<li class="page-item disabled">';
                }else {
                    echo '<li class="page-item">';
                }
                
                switch ($_GET['pag']) {
                    case '1':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=2" aria-label="Previous">';
                        break;
                    case '2':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=3" aria-label="Previous">';
                        break;
                    case '3':
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=4" aria-label="Previous">';
                        break;

                    default:
                        echo '<a class="page-link" href="index.php?page=listBrand&pag=2" aria-label="Previous">';
                        break;
                }//end switch pagination next

                    if ($page == 4) {
                        echo '<i class="fa fa-arrow-circle-right text-muted" aria-hidden="true"></i>';
                    }else {
                        echo '<i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i>';
                    }
                ?>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
    </nav>
</div>