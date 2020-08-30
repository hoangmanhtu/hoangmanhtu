<?php
require_once 'frontend/models/Producer.php';
class ProducerController extends Controller
{
    public function index()
    {
        $producer_model = new Producer();
        $producers = $producer_model->getAllProducer();
        $this->content = $this->render('frontend/views/producer/producer.php', ['producers' => $producers
        ]);
        echo $this->content;
    }
}
