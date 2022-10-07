<?php

namespace App\Controller;

use App\Entity\Calculator;
use App\Form\CalculatorType;
use App\operation\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class CalculatorController extends AbstractController
{
    #[Route('/calculator')]
    public function calculate(Environment $twig, Request $request): Response
    {
        $calculator = new Calculator();
        $form = $this->createForm(CalculatorType::class, $calculator);

        $form->handleRequest($request);

        $result = 0;

        if ($form->isSubmitted() && $form->isValid()) {
            $result = match ($calculator->getOperation()) {
                Operation::MINUS => $calculator->getFirstNum() - $calculator->getSecondNum(),
                Operation::PLUS => $calculator->getFirstNum() + $calculator->getSecondNum(),
                Operation::DIVIDE => $calculator->getFirstNum() / $calculator->getSecondNum(),
                Operation::MULTIPLY => $calculator->getFirstNum() * $calculator->getSecondNum()
            };
        }

        return new Response(
            $twig->render('calculator/calculator.html.twig', [
                'calculator_form' => $form->createView(),
                'calculator' => $calculator,
                'equals_to' => $result
            ])
        );
    }
}
