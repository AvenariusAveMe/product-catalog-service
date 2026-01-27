<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/products')]
class ProductController extends AbstractController
{
    #[Route('', methods: ['POST'])]
public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse
{
    /** @var Product $product */
    $product = $serializer->deserialize($request->getContent(), Product::class, 'json');
    $product->setCreatedAt(new \DateTimeImmutable());

    $em->persist($product);
    $em->flush();

    return $this->json($product, 201, [], ['groups' => ['product:read']]);
}

    #[Route('/{id}', methods: ['GET'])]
    public function read(Product $product): JsonResponse
    {
        return $this->json($product, 200, [], ['groups' => ['product:read']]);
    }

    #[Route('/{id}', methods: ['PATCH', 'PUT'])]
    public function update(Product $product, Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $serializer->deserialize(
            $request->getContent(),
            Product::class,
            'json',
            ['object_to_populate' => $product]
        );

        $em->flush();

        return $this->json($product, 200, [], ['groups' => ['product:read']]);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(Product $product, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($product);
        $em->flush();

        return new JsonResponse(null, 204);
    }
}