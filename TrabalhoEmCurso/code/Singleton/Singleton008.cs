public sealed class GenericSingleton<T> where T : class, new()
{
    private static T _instance;

    public static T GetInstance()
    {
        lock (typeof(T))
        {
            if (_instance == null)
                _instance = new T();

            return _instance;
        }
    }
}

// Teste do padrão Singleton
public class Car { public int Color { get; set; } }
public class Person { public string Name { get; set; } }

class Program
{
    static void Main(string[] args)
    {
        Car car = GenericSingleton<Car>.GetInstance();
        car.Color = 1;
        Person per = GenericSingleton<Person>.GetInstance();
        per.Name = "John";

        Car car2 = GenericSingleton<Car>.GetInstance();
        car.Color = 2;
    }
}