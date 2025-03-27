<?php
require_once('root/db_connection.php');

// Get all active courses
$query = "SELECT * FROM courses WHERE status = 1 ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
require_once('partials/head.php');

?>

    <style>
        .course-card {
            margin-bottom: 30px;
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        .course-image {
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            overflow: hidden;
            background: #f8f9fa;
        }
        .course-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .course-content {
            padding: 20px;
        }
        .course-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
        }
        .course-description {
            color: #666;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .course-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: #28a745;
            margin-bottom: 15px;
        }
        .course-btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .course-btn:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
        }
        .page-header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/images/courses-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
            padding-bottom: 20px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #007bff;
        }
    </style>
</head>
<body>
    <?php include_once('header.php'); ?>

    <!-- Page Header -->
    <div class="page-header text-center">
        <div class="container">
            <h1>Our Courses</h1>
            <p class="lead">Discover our comprehensive range of courses designed to help you succeed</p>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="container">
        <h2 class="section-title">Available Courses</h2>
        
        <div class="row">
            <?php foreach ($courses as $course): ?>
                <div class="col-md-4">
                    <div class="card course-card">
                        <div class="course-image">
                            <?php if ($course['image']): ?>
                                <img src="<?php echo htmlspecialchars($course['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($course['name']); ?>">
                            <?php else: ?>
                                <img src="assets/images/default-course.jpg" alt="Default course image">
                            <?php endif; ?>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title"><?php echo htmlspecialchars($course['name']); ?></h3>
                            <p class="course-description">
                                <?php echo strip_tags(substr($course['description'], 0, 150)) . '...'; ?>
                            </p>
                            <div class="course-price">$<?php echo number_format($course['price'], 2); ?></div>
                            <a href="course-details.php?id=<?php echo $course['id']; ?>" class="btn course-btn">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include_once('partials/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 