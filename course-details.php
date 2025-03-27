<?php
require_once('partials/head.php');
require_once('root/db_connection.php');

if (!isset($_GET['id'])) {
    header("Location: courses.php");
    exit();
}

$course_id = $_GET['id'];
$query = "SELECT * FROM courses WHERE id = :id AND status = 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $course_id);
$stmt->execute();
$course = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$course) {
    header("Location: courses.php");
    exit();
}
?>



    <style>
        .course-header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo $course['image'] ? htmlspecialchars($course['image']) : 'assets/images/default-course.jpg'; ?>');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        .course-title {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .course-price {
            font-size: 2rem;
            font-weight: 600;
            color: #28a745;
            margin-bottom: 30px;
        }
        .course-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }
        .course-image {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .course-image img {
            width: 100%;
            height: auto;
        }
        .enroll-btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .enroll-btn:hover {
            background: #218838;
            color: white;
            text-decoration: none;
        }
        .course-info {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .course-info h3 {
            margin-bottom: 20px;
            color: #333;
        }
        .course-info ul {
            list-style: none;
            padding: 0;
        }
        .course-info li {
            margin-bottom: 10px;
            color: #666;
        }
        .course-info li i {
            color: #28a745;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php include_once('header.php'); ?>

    <!-- Course Header -->
    <div class="course-header">
        <div class="container">
            <h1 class="course-title"><?php echo htmlspecialchars($course['name']); ?></h1>
            <div class="course-price">$<?php echo number_format($course['price'], 2); ?></div>
            <a href="#enroll" class="btn enroll-btn">Enroll Now</a>
        </div>
    </div>

    <!-- Course Content -->
    <div class="container" style="padding-top: 50px;padding-bottom: 100px;">
        <div class="row">
            <div class="col-md-8">
                <?php if ($course['image']): ?>
                    <div class="course-image">
                        <img src="<?php echo htmlspecialchars($course['image']); ?>" 
                             alt="<?php echo htmlspecialchars($course['name']); ?>">
                    </div>
                <?php endif; ?>
                
                <div class="course-description">
                    <?php echo $course['description']; ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="course-info">
                    <h3>Course Information</h3>
                    <ul>
                        <li><i class="fas fa-clock"></i> Duration: <?php echo htmlspecialchars($course['duration']); ?></li>
                        <li><i class="fas fa-certificate"></i> <?php echo htmlspecialchars($course['certificate']); ?></li>
                        <li><i class="fas fa-laptop"></i> <?php echo htmlspecialchars($course['access_type']); ?></li>
                        <li><i class="fas fa-users"></i> <?php echo htmlspecialchars($course['support_type']); ?></li>
                    </ul>
                </div>
                
                <div class="course-info">
                    <h3>What You'll Learn</h3>
                    <ul>
                        <?php 
                        $learning_outcomes = explode("\n", $course['learning_outcomes']);
                        foreach ($learning_outcomes as $outcome): 
                            if (trim($outcome) != ''):
                        ?>
                            <li><i class="fas fa-check"></i> <?php echo htmlspecialchars(trim($outcome)); ?></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                </div>
                
                <div class="text-center">
                    <a href="#enroll" class="btn enroll-btn">Enroll Now</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('partials/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 