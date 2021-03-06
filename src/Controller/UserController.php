<?php

declare(strict_types = 1);

namespace Controller;

use Framework\Render;
use Service\User\Security;
use Service\User\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    use Render;

    /**
     * Производим аутентификацию и авторизацию
     *
     * @param Request $request
     * @return Response
     */
    public function authenticationAction(Request $request): Response
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $user = new Security($request->getSession());

            $isAuthenticationSuccess = $user->authentication(
                $request->request->get('login'),
                $request->request->get('password')
            );

            if ($isAuthenticationSuccess) {
                return $this->render('user/authentication_success.html.php', ['user' => $user->getUser()]);
            } else {
                $error = 'Неправильный логин и/или пароль';
            }
        }

        return $this->render('user/authentication.html.php', ['error' => $error ?? '']);
    }

    /**
     * Выходим из системы
     *
     * @param Request $request
     * @return Response
     */
    public function logoutAction(Request $request): Response
    {
        (new Security($request->getSession()))->logout();

        return $this->redirect('index');
    }

    /**
         * Список пользователей
         *
         * @param Request $request
         * @return Response
         */
    public function listUsersAction(Request $request): Response
    {
        $adminCheck = (new Security($request->getSession()))->isAdmin();
        if ($adminCheck) {
            $userList = (new User())->getAll();
            return $this->render('user/list.html.php', ['userList' => $userList]);
        } else {
            return $this->render('error404.html.php', []);
        }
    }

    /**
         * Личный кабинет пользователя
         *
         * @param Request $request
         * @return Response
         */
    public function lkUserAction(Request $request): Response
    {
        $user = (new Security($request->getSession()))->getUser();
        return $this->render('user/lk.html.php', ['user'=>$user]);
    }
}
