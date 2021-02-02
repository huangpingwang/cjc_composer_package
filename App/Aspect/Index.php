<?php


namespace Cjc;


use App\Controller\IndexController;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Index
 * @package App\Aspect
 * @Aspect()
 */
class Index extends AbstractAspect
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    public function __construct(ContainerInterface $container,ResponseInterface $response,RequestInterface $request)
    {
        $this->container = $container;
        $this->response = $response;
        $this->request = $request;
    }

    public $classes = [
        IndexController::class,
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $params = $this->request->getQueryParams();
        var_dump($params);
        // TODO: Implement process() method.
        $result = $proceedingJoinPoint->process();
        var_dump($result);
        return $result;
    }
}