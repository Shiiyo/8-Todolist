<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks", name="task_list")
     */
    public function list(TaskRepository $repo)
    {
        return $this->render('task/list.html.twig', ['tasks' => $repo->findIsDone(false)]);
    }

    /**
     * @Route("/tasks/completed", name="completed_task_list")
     */
    public function completedTaskList(TaskRepository $repo)
    {
        return $this->render('task/list.html.twig', ['tasks' => $repo->findIsDone(true)]);
    }

    /**
     * @Route("/tasks/create", name="task_create")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setCreatedAt(new \DateTime());
            $task->setIsDone(false);
            $task->setUser($this->getUser());

            $manager->persist($task);
            $manager->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/tasks/{id}/edit", name="task_edit")
     */
    public function edit(Task $task, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }

    /**
     * @Route("/tasks/{id}/toggle", name="task_toggle")
     */
    public function toggleTask(Task $task, EntityManagerInterface $manager)
    {
        $task->setIsDone(!$task->getIsDone());
        $manager->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }

    /**
     * @Route("/tasks/{id}/delete", name="task_delete")
     */
    public function deleteTask(Task $task, EntityManagerInterface $manager)
    {
        if ($this->getUser() == $task->getUser() or $task->getUser() == null and $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $manager->remove($task);
            $manager->flush();

            $this->addFlash('success', 'La tâche a bien été supprimée.');

            return $this->redirectToRoute('task_list');
        } else {
            $this->addFlash('error', 'Vous n\'avez pas les droits pour supprimer cette tâche.');

            return $this->redirectToRoute('task_list');
        }
    }
}
